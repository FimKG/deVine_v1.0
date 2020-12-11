// File Counter
$.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
    var fileIdCounter = 0;

    this.closest(".files").change(function (evt) {
        var output = [];

        for (var i = 0; i < evt.target.files.length; i++) {
            fileIdCounter++;
            var file = evt.target.files[i];
            var fileId = sectionIdentifier + fileIdCounter;

            filesToUpload.push({
                id: fileId,
                file: file
            });

            var removeLink = "<a class=\"removeFile\" href=\"#\" data-fileid=\"" + fileId + "\">Remove</a>";

            output.push("<li><strong>", escape(file.name), "</strong> &nbsp; - &nbsp; ", removeLink, "</li> ");
        };

        $(this).children(".fileList")
            .append(output.join(""));

        evt.target.value = null;
    });

    $(this).on("click", ".removeFile", function (e) {
        e.preventDefault();

        var fileId = $(this).parent().children("a").data("fileid");

        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id === fileId)
                filesToUpload.splice(i, 1);
        }

        $(this).parent().remove();
    });

    this.clear = function () {
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                filesToUpload.splice(i, 1);
        }

        $(this).children(".fileList").empty();
    }

    return this;
};

// DISPLAY UPLOADED PHOTOS 
var filesToUpload = [];
var files1Uploader = $("#up_filecar").fileUploader(filesToUpload, "up_filecar");
var files2Uploader = $("#up_filedamage").fileUploader(filesToUpload, "up_filedamage");

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
        var formData = new FormData();
        // var filecar = [];
        if (filesToUpload == "") {
            document.querySelector('.status').innerHTML = "Please Upload Images";
            return false;
        }

        for (var i = 0, len = filesToUpload.length; i < len; i++) {
            formData.append("files", filesToUpload[i].file);
        }

       // Message
        var message = document.getElementById('message').value;
        if (message == "") {
            document.querySelector('.status').innerHTML = "Message cannot be empty";
            return false;
        }

        document.getElementById('status').innerHTML = "Sending...";
        $('.status').hide();
        // $('#btnSend').hide();
        formData = {
            'name': $('input[name=name]').val(),
            'email': $('input[name=email]').val(),
            'phone': $('input[name=phone]').val(),
            'subject': $('input[name=subject]').val(),
            'model': $('input[name=model]').val(),
            'regNo': $('input[name=regNo]').val(),
            'year': $('input[name=year]').val(),
            'filecar': files1Uploader,
            'filedamage': files2Uploader,
            'message': $('textarea[name=message]').val()
        };

        console.log(" \n- ", formData, " \n\n\n\n- "); 

        // console.log(name, " \n- ", email, " \n- ", phone, " \n- ", subject, " \n- ", model,
        //     " \n- ", regNo, " \n- ", year, " \n- ", filecar, " \n- ", filedamage, " \n- ", message);

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
            success: function (data, response, jqXHR) {
                files1Uploader.clear();
                files2Uploader.clear();
                document.getElementById('status').innerHTML = "";

                console.log('response: ========', response);
                console.log('data: ========', data);
                console.log('jqXHR: ========', jqXHR);

            },
            error: function (errorThrown, response, jqXHR) {
                console.log('error: ========', errorThrown);
                // console.log('error: ========', response);
                document.querySelector('.status').innerHTML = "Unable to Send Email: " + errorThrown.responseText;
            }
        });
    } catch (error) {
        throw new Error(error.message);
    }
    return false;
});
