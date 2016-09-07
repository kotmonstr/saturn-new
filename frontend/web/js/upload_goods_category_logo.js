function sendfile() {
    var fd = new FormData(document.getElementById("form-send-file"));
    fd.append("CustomField", "This is some extra data");
    jQuery.ajax({
        url: "/goods-category/submit",
        type: "POST",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            jQuery('.target_image').attr('src', '/upload/goods_category/' + data.imageName)
            jQuery('#goodscategory-image').val(data.imageName);
        }
    });
}

