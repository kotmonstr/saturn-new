function sendfile() {
    var fd = new FormData(document.getElementById("form-send-file"));
    fd.append("CustomField", "This is some extra data");
    jQuery.ajax({
        url: "/goods-category/submit",
        type: "POST",
        data: fd,
        processData: false,
        contentType: false,
        beforeSend: function (xhr) {
            jpreloader('show');
        },
        success: function (data) {
            jpreloader('hide');
            jQuery('.target_image').attr('src', '/upload/goods_category/' + data.imageName)
            jQuery('#goodscategory-image').val(data.imageName);
        }
    });
}

/* Preloader */
function jpreloader(item) {
    if (item == 'show') {
        $(document.body).append('<div class="back_background jpreloader" style="z-index: 90000;"></div>');
    } else {
        $('.jpreloader').remove();
    }
}

