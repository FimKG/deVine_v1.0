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

        // evt.target.value = null;
    });

    // $(this).on("click", ".removeFile", function (e) {
    //     e.preventDefault();

    //     var fileId = $(this).parent().children("a").data("fileid");

    //     for (var i = 0; i < filesToUpload.length; ++i) {
    //         if (filesToUpload[i].id === fileId)
    //             filesToUpload.splice(i, 1);
    //     }

    //     $(this).parent().remove();
    // });

//     this.clear = function () {
//         for (var i = 0; i < filesToUpload.length; ++i) {
//             if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
//                 filesToUpload.splice(i, 1);
//         }

//         $(this).children(".fileList").empty();
//     }

    return this;
};

// DISPLAY UPLOADED PHOTOS 
var filesToUpload = [];
var files1Uploader = $("#up_filecar").fileUploader(filesToUpload, "up_filecar");
var files2Uploader = $("#up_filedamage").fileUploader(filesToUpload, "up_filedamage");
// $("#btnSend").html("Send");
// $.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
//     var fileIdCounter = 0;

//     this.closest(".files").change(function (evt) {
//         var output = [];

//         for (var i = 0; i < evt.target.files.length; i++) {
//             fileIdCounter++;
//             var file = evt.target.files[i];
//             var fileId = sectionIdentifier + fileIdCounter;

//             filesToUpload.push({
//                 id: fileId,
//                 file: file
//             });

//             var removeLink = "<a class=\"removeFile\" href=\"#\" data-fileid=\"" + fileId + "\">Remove</a>";

//             output.push("<li><strong>", escape(file.name), "</strong> - ", file.size, " bytes. &nbsp; &nbsp; ", removeLink, "</li> ");
//         };

//         $(this).children(".fileList")
//             .append(output.join(""));

//         //reset the input to null - nice little chrome bug!
//         evt.target.value = null;
//     });

//     $(this).on("click", ".removeFile", function (e) {
//         e.preventDefault();

//         var fileId = $(this).parent().children("a").data("fileid");

//         // loop through the files array and check if the name of that file matches FileName
//         // and get the index of the match
//         for (var i = 0; i < filesToUpload.length; ++i) {
//             if (filesToUpload[i].id === fileId)
//                 filesToUpload.splice(i, 1);
//         }

//         $(this).parent().remove();
//     });

//     this.clear = function () {
//         for (var i = 0; i < filesToUpload.length; ++i) {
//             if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
//                 filesToUpload.splice(i, 1);
//         }

//         $(this).children(".fileList").empty();
//     }

//     return this;
// };

// (function () {
//     var filesToUpload = [];

//     var files1Uploader = $("#files1").fileUploader(filesToUpload, "files1");
//     var files2Uploader = $("#files2").fileUploader(filesToUpload, "files2");

//     $("#uploadBtn").click(function (e) {
//         e.preventDefault();

//         var formData = new FormData();

//            // totalUploadFiles = '';
        // for (var i = 0, len = filesToUpload.length; i < len; i++) {
        //     formData.append("name", filesToUpload[i].file);
        //     // filesToUploader = filesToUpload[i].file;
        //     // filelist = filesToUploader.name;
        //     // totalUploadFiles += filelist + ', ';
        // }

//         $.ajax({
//             url: "http://requestb.in/1k0dxvs1",
//             data: formData,
//             processData: false,
//             contentType: false,
//             type: "POST",
//             success: function (data) {
//                 alert("DONE");

//                 files1Uploader.clear();
//                 files2Uploader.clear();
//             },
//             error: function (data) {
//                 alert("ERROR - " + data.responseText);
//             }
//         });
//     });
// })()



// /* contact form validation */
// $('#contact-form').on('submit', function (event) {

//     // "use strict";


//     var filecar = document.getElementById('filecar').value;
//     if (filecar == "") {
//         document.querySelector('.status').innerHTML = "filecar cannot be empty";
//         return false;
//     }
//     var filedamage = document.getElementById('filedamage').value;
//     if (filedamage == "") {
//         document.querySelector('.status').innerHTML = "filedamage cannot be empty";
//         return false;
//     }
//     // File validation UPLOAD PHOTOS



//     document.getElementById('status').innerHTML = "Sending...";
//     $('.status').hide();
//     $('#btnSend').hide();
//     var formData = new FormData();
//     formData = {
//         'name': $('input[name=name]').val(),
//         'email': $('input[name=email]').val(),
//         'phone': $('input[name=phone]').val(),
//         'subject': $('input[name=subject]').val(),
//         'model': $('input[name=model]').val(),
//         'regNo': $('input[name=regNo]').val(),
//         'year': $('input[name=year]').val(),
//         'filecar': $('input[name=filecar]').val(),
//         'filedamage': $('input[name=filedamage]').val(),
//         'message': $('textarea[name=message]').val()
//     };

//     var this_type = $(this),
//         url = this_type.attr('action'),
//         type = this_type.attr('method'),
//         data = formData;

//     this_type.find('[name]').each(function (index, value) {
//         var this_name = $(this),
//             name = this_name.attr('name'),
//             value = this_name.val();

//         data[name] = value;
//     });

//     $.ajax({
//         url: url,
//         type: type,
//         data: data,
//         success: function (response, data) {
//             console.log('response: ========', response);


//         },
//         error: function (xhr,status,error){
//             console.log('error: ========', error);
//         }


//     });
//     return false;

// });




 // File validation UPLOAD PHOTOS

    // var filecar = document.getElementById('filecar');
    // filecar.addEventListener("change", handleFiles, false);
    // function handleFiles() {
    //     var fileIdCounter = 0;

    //     var ulist = [];

    //     var fileList = e.target.files;
    //     filesLength = fileList.length;


    //     console.log(" - ", filesLength);

    //     // const selectedFiles = this.files; /* now you can work with the file list */
    //     // console.log(selectedFiles);
    // }

    // console.log(name, " \n- ", email, " \n- ", phone, " \n- ", subject, " \n- ", model, 
    // " \n- ", regNo, " \n- ", year, " \n- ", filecar, " \n- ", filedamage);

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


//     jQuery(document).on('click', 'button#btnSend', function() {
//         jQuery.ajax({
//             type:'POST',
//             url:'action.php',
//             data:  new FormData(jQuery("form#sending-email-frm")[0]),
//             contentType: false,
//             cache: false,
//             processData:false,
//             dataType:'json',    
//             beforeSend: function () {
//                 jQuery('button#btnSend').button('Loding..');
//             },  
     
//             complete: function () {
//                 jQuery('button#btnSend').button('reset');
//                 setTimeout(function () {
//                     jQuery("form#sending-email-frm")[0].reset();
//                 }, 2000);
                
//             },
//             success: function (json) {
//                 $('.text-danger').remove();
//                 if (json['error']) {
//                   jQuery('span#success-msg').html('');            
//                     for (i in json['error']) {
//                         var element = $('.imput-mail-' + i.replace('_', '-'));
//                         if ($(element).parent().hasClass('input-group')) {                       
//                             $(element).parent().after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
//                         } else {
//                             $(element).after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
//                         }
//                     }
//                 } else {
//                   jQuery('span#success-msg').html('<div class="alert alert-success">You have successfully subscribed to the newsletter</div>');
                    
//                 }                       
//             },
//             error: function (xhr, ajaxOptions, thrownError) {
//                 console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//             }        
//         });
//     });		