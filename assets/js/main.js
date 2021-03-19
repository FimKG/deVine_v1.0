/* contact form validation */
$("#contact-form").on("submit", function (event) {
  event.preventDefault();
  try {
    // CONTACT DETAILS
    var name = document.getElementById("name").value;
    if (name == "") {
      document.querySelector(".status").innerHTML = "Name cannot be empty";
      return false;
    }
    var email = document.getElementById("email").value;
    if (email == "") {
      document.querySelector(".status").innerHTML = "Email cannot be empty";
      return false;
    } else {
      var req = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!req.test(email)) {
        document.querySelector(".status").innerHTML = "Email format invalid";
        return false;
      }
    }
    var phone = document.getElementById("phone").value;
    if (phone == "") {
      document.querySelector(".status").innerHTML = "Phone cannot be empty";
      return false;
    }
    var subject = document.getElementById("subject").value;
    if (subject == "") {
      document.querySelector(".status").innerHTML = "subject cannot be empty";
      return false;
    }

    // CAR DETAILS
    var model = document.getElementById("model").value;
    if (model == "") {
      document.querySelector(".status").innerHTML =
        "Car Make/Model cannot be empty";
      return false;
    }
    var regNo = document.getElementById("regNo").value;
    if (regNo == "") {
      document.querySelector(".status").innerHTML =
        "Vehicle Registration cannot be empty";
      return false;
    }
    var year = document.getElementById("year").value;
    if (year == "") {
      document.querySelector(".status").innerHTML = "Year cannot be empty";
      return false;
    }

    // File UPLOAD PHOTOS
    var filecar = $("#filecar").prop("files");
    var filedamage = $("#filedamage").prop("files");

    if (filecar.length == 0) {
      document.querySelector(".status").innerHTML =
        "Please Upload Images of Photo of the ENTIRE car";
      return false;
    }
    if (filedamage.length == 0) {
      document.querySelector(".status").innerHTML =
        "Please Upload Images of Close-up photo of the damage";
      return false;
    }

    // Message
    var message = document.getElementById("message").value;
    if (message == "") {
      document.querySelector(".status").innerHTML = "Message cannot be empty";
      return false;
    }

    // Create a FormData object
    var formData = new FormData();
    formData.append("name", $("input[name=name]").val());
    formData.append("email", $("input[name=email]").val());
    formData.append("phone", $("input[name=phone]").val());
    formData.append("subject", $("input[name=subject]").val());
    formData.append("model", $("input[name=model]").val());
    formData.append("regNo", $("input[name=regNo]").val());
    formData.append("year", $("input[name=year]").val());
    formData.append("filecar", filecar);
    formData.append("filedamage", filedamage);
    formData.append("message", $("textarea[name=message]").val());

    // document.getElementById('status').innerHTML = "Sending...";
    // $('.status').hide();
    // $('#btnSend').hide();
    // console.log(formData);

    var this_type = $(this);
    var url = this_type.attr("action");
    var type = this_type.attr("method");

    $.ajax({
      type: type,
      url: url,
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      timeout: 600000,
      beforeSend: function () {
        $("button#btnSend").button("Loding..");
      },
      success: function (data, response, jqXHR) {
        console.log("response: ========", response);
        console.log("data: ========", data);
        console.log("jqXHR: ========", jqXHR);
        $(".status").remove();
      },
      error: function (errorThrown, response, jqXHR) {
        // console.log('error: ========', errorThrown);
        // console.log('error: ========', response);
        document.querySelector(".status").innerHTML =
          "Unable to Send Email: " + errorThrown.responseText;
      },
    });
  } catch (error) {
    console.log(error);
  }
  return false;
});
