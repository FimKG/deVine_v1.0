/* contact form validation */
$('#contact-form').on('submit', function (event) {

    event.preventDefault();
    try {
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

        // File UPLOAD PHOTOS
        var filecar = $('#filecar').prop('files');
        var filedamage = $('#filedamage').prop('files');

        if (filecar == 0 || filedamage == 0) {
            document.querySelector('.status').innerHTML = "Please Upload Images";
            return false;
        }

        // Message
        var message = document.getElementById('message').value;
        if (message == "") {
            document.querySelector('.status').innerHTML = "Message cannot be empty";
            return false;
        }

        // Create an FormData object 
        var formData = new FormData();
        formData = {
            'name': $('input[name=name]').val(),
            'email': $('input[name=email]').val(),
            'phone': $('input[name=phone]').val(),
            'subject': $('input[name=subject]').val(),
            'model': $('input[name=model]').val(),
            'regNo': $('input[name=regNo]').val(),
            'year': $('input[name=year]').val(),
            'filecar': filecar,
            'filedamage': filedamage,
            'message': $('textarea[name=message]').val()
        };

        // document.getElementById('status').innerHTML = "Sending...";
        // $('.status').hide();
        // $('#btnSend').hide();

        var this_type = $(this)
        var url = this_type.attr('action')
        var type = this_type.attr('method')

        $.ajax({
            type: type,
            enctype: 'multipart/form-data',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
                $('#btnSend').button('Loding..');
            },
            // complete: function () {
            //     $('button#btnSend').button('reset');
            //     setTimeout(function () {
            //         $("form#contact-form")[0].reset();
            //     }, 2000);

            // },
            success: function (json) {
                $('.text-danger').remove();
                // if (json['error']) {
                //   $('span#success-msg').html('');            
                //     for (i in json['error']) {
                //         var element = $('.imput-mail-' + i.replace('_', '-'));
                //         if ($(element).parent().hasClass('input-group')) {                       
                //             $(element).parent().after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                //         } else {
                //             $(element).after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                //         }
                //     }
                // } else {
                //   $('span#success-msg').html('<div class="alert alert-success">You have successfully subscribed to the newsletter</div>');

                // }                       
            },
            // success: function (data, response, jqXHR) {
            //     // files1Uploader.clear();
            //     // files2Uploader.clear();
            //     document.getElementById('status').innerHTML = "";


            //     // console.log('response: ========', response);
            //     // console.log('data: ========', data);
            //     // console.log('jqXHR: ========', jqXHR);

            // },
            error: function (errorThrown, response, jqXHR) {
                // console.log('error: ========', errorThrown);
                // console.log('error: ========', response);
                document.querySelector('.status').innerHTML = "Unable to Send Email: " + errorThrown.responseText;
            }
        });
    } catch (error) {
        console.log(error)
    }
    return false;
});
