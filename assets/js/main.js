function validateForm() {

    $('.status').hide();
    // CONTACT DETAILS
    var name = document.getElementById('name').value;
    if (name == "") {
        document.querySelector('.status').innerHTML = "Name cannot be empty";
        return false;
    }
    var email = document.getElementById('email').value;
    if (email == "") {
        document.querySelector('.status').innerHTML = "Email cannot be empty";
        return false;
    } else {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(email)) {
            document.querySelector('.status').innerHTML = "Email format invalid";
            return false;
        }
    }
    var phone = document.getElementById('phone').value;
    if (phone == "") {
        document.querySelector('.status').innerHTML = "Phone cannot be empty";
        return false;
    } else {
        var pno = /^\d{10}$/;
        if (!phone.value.match(pno)) {
            document.querySelector('.status').innerHTML = "Enter 10 numbers";
            return true;
        }
    }
    if (subject == "") {
        document.querySelector('.status').innerHTML = "subject cannot be empty";
        return false;
    }
    // CAR DETAILS
    var model = document.getElementById('model').value;
    if (model == "") {
        document.querySelector('.status').innerHTML = "Car Make/Model cannot be empty";
        return false;
    }
    var regNo = document.getElementById('regNo').value;
    if (regNo == "") {
        document.querySelector('.status').innerHTML = "Vehicle Registration cannot be empty";
        return false;
    }
    var year = document.getElementById('year').value;
    if (year == "") {
        document.querySelector('.status').innerHTML = "Year cannot be empty";
        return false;
    } else {
        var yer = /^\d{4}$/;
        if (!year.value.match(yer)) {
            document.querySelector('.status').innerHTML = "Enter 4 numbers";
            return true;
        }
    }

    // File validation UPLOAD PHOTOS

    var filecar = document.getElementById('filecar').value;
    if (filecar.files.length == 0) {
        document.querySelector('.status').innerHTML = "filecar cannot be empty";
        filecar.focus();
        return false;
    }

    var filedamage = document.getElementById('filedamage').value;
    if (filedamage.files.length == 0) {
        document.querySelector('.status').innerHTML = "filedamage cannot be empty";
        filedamage.focus();
        return false;
    }

    // =============================================================
    var message = document.getElementById('message').value;
    if (message == "") {
        document.querySelector('.status').innerHTML = "Message cannot be empty";
        return false;
    }

 


    document.getElementById('status').innerHTML = "Sending...";
    formData = {
        'name': $('input[name=name]').val(),
        'email': $('input[name=email]').val(),
        'phone': $('input[name=phone]').val(),
        'subject': $('input[name=subject]').val(),
        'filecar': $('input[name=filecar]').val(),
        'filedamage': $('input[name=filedamage]').val(),
        'model': $('input[name=model]').val(),
        'regNo': $('input[name=regNo]').val(),
        'message': $('textarea[name=message]').val()
    };

console.log(formData);

    $.ajax({
        url: "send_mail.php",
        type: "POST",
        data: formData,
        success: function (data, textStatus, jqXHR) {

            $('#status').text(data.message);
            if (data.code) //If mail was sent successfully, reset the form.
                $('#contact-form').closest('form').find("input[type=text], textarea").val("");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#status').text(jqXHR);
        }
    });
}