/* contact form validation */
$('#contact-form').on('submit', function (event) {

    event.preventDefault();

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
        var req = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!req.test(email)) {
            document.querySelector('.status').innerHTML = "Email format invalid";
            return false;
        }
    }
    var phone = document.getElementById('phone').value;
    if (phone == "") {
        document.querySelector('.status').innerHTML = "Phone cannot be empty";
        return false;

    }

    var subject = document.getElementById('subject').value;
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
    }
    // File validation UPLOAD PHOTOS

    // var filecar = document.getElementById('filecar').value;
    // if (filecar.files.length == 0) {
    //     document.querySelector('.status').innerHTML = "filecar cannot be empty";
    //     filecar.focus();
    //     return false;
    // }

    // var filedamage = document.getElementById('filedamage').value;
    // if (filedamage.files.length == 0) {
    //     document.querySelector('.status').innerHTML = "filedamage cannot be empty";
    //     filedamage.focus();
    //     return false;
    // }

    // =============================================================
    var message = document.getElementById('message').value;
    if (message == "") {
        document.querySelector('.status').innerHTML = "Message cannot be empty";
        return false;
    }




    document.getElementById('status').innerHTML = "Sending...";
    $('.status').hide();
    formData = {
        'name': $('input[name=name]').val(),
        'email': $('input[name=email]').val(),
        'phone': $('input[name=phone]').val(),
        'subject': $('input[name=subject]').val(),
        // 'filecar': $('input[name=filecar]').val(),
        // 'filedamage': $('input[name=filedamage]').val(),
        'model': $('input[name=model]').val(),
        'regNo': $('input[name=regNo]').val(),
        'year': $('input[name=year]').val(),
        'message': $('textarea[name=message]').val()
    };

    // $.ajax({
    //     url: "assets/php/send_mail.php",
    //     type: "POST",
    //     data: formData,
    //     success: function (data, textStatus, jqXHR) {

    //         $('#status').text(data.message);
    //         if (data.code) //If mail was sent successfully, reset the form.
    //             $('#contact-form').closest('form').find("input[type=text], textarea").val("");
    //     },
    //     error: function (jqXHR, textStatus, errorThrown) {
    //         $('#status').text(jqXHR);
    //     }
    // });



    var this_type = $(this),
        url = this_type.attr('action'),
        type = this_type.attr('method'),
        data = formData;
    
    this_type.find('[name]').each(function (index, value) {
        var this_name = $(this),
            name = this_name.attr('name'),
            value = this_name.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function (response, data) {
            console.log('response: ========',response);
            
            console.log('data: ========', data);
        }
        
    });
    return false;

});
