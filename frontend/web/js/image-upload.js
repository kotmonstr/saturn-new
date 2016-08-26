function sendfile() {
   
    
    ;/* Preloader */
function jpreloader(item) {
    if (item == 'show') {
        jQuery(document.body).append('<div class="back_background jpreloader" style="z-index: 90000;"></div>');
    } else {
        jQuery('.jpreloader').remove();
    }
}

}

function startUpload(){
    var fd = new FormData(document.getElementById("form-article"));
    jQuery('.avatar').html('');
    jQuery.ajax({
        url: "/article/image-submit",
        type: "POST",
        data: fd,
        asinc:false,
        processData: false,
        contentType: false,
        success: function (data) {
            jQuery('.avatar').html('<img src="/upload/article/'+ data +'" height="200px" width="150px" alt="image">')
            jQuery('#article-image').val(data);
        },
 
    })
}