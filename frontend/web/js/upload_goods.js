function sendfile() {
    var fd = new FormData(document.getElementById("form-send-file"));
    fd.append("CustomField", "This is some extra data");
    jQuery.ajax({
        url: "/goods/submit",
        type: "POST",
        data: fd,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        beforeSend: function (xhr) {
            jpreloader('show');
        },
        success: function (data) {
            jpreloader('hide');
            //$('#goods-image_file').html(data.imageName);

            jQuery('.target_image').attr('src', '/upload/goods/' + data.imageName)
            jQuery('.new_image').val(data.imageName);
        }
    })

    ;
    /* Preloader */
    function jpreloader(item) {
        if (item == 'show') {
            jQuery(document.body).append('<div class="back_background jpreloader" style="z-index: 90000;"></div>');
        } else {
            jQuery('.jpreloader').remove();
        }
    }

}

function uploadExtraImage(id) {
    //alert(id);
    var fd = new FormData(document.getElementById("form-send-file"));
    fd.append("id", id);
    jQuery.ajax({
        url: "/goods/upload-extra-image",
        type: "POST",
        data: fd,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        beforeSend: function (xhr) {
            jpreloader('show');
        },
        success: function (data) {
            jpreloader('hide');
            if (data.limit) {
                //ToDo cистемное сообщение
                jQuery('#system').css('opacity', '1').show(), jQuery('.layout').show();
                jQuery('#system .modal-body p').html(data.limit);
            }

            if (data.a) {

                jQuery('.field-goods-new_image').append('<img src="/' + data.a + '" alt="" width="100px" height="100px" style="display:inline"><div onclick="del-image(' + data.a_id + ')" class="del-image">X</div>');
            }
            if (data.b) {
                jQuery('.field-goods-new_image').append('<img src="/' + data.b + '" alt="" width="100px" height="100px" style="display:inline"><div onclick="del-image(' + data.b_id + ')" class="del-image">X</div>');
            }
            if (data.c) {
                jQuery('.field-goods-new_image').append('<img src="/' + data.c + '" alt="" width="100px" height="100px" style="display:inline"><div onclick="del-image(' + data.c_id + ')" class="del-image">X</div>');
            }
            if (data.d) {
                jQuery('.field-goods-new_image').append('<img src="/' + data.d + '" alt="" width="100px" height="100px" style="display:inline"><div onclick="del-image(' + data.d_id + ')" class="del-image">X</div>');
            }
            if (data.e) {
                jQuery('.field-goods-new_image').append('<img src="/' + data.e + '" alt="" width="100px" height="100px" style="display:inline"><div onclick="del-image(' + data.e_id + ')" class="del-image">X</div>');
            }

        }
    })
}