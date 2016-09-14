function getPodCatBycatId(id) {
    //alert(id);
    var csrf_token = jQuery("meta[name=csrf-token]").attr("content");
    jQuery.ajax({
        url: '/site/get-pod-cats-by-category',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            id: id,
        },
        beforeSend: function (xhr) {
            jpreloader('show');
        },
        success: function (data) {
            jpreloader('hide');
            jQuery('#goods-pod_category_id').html(data);
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