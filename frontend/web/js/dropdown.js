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
        success: function (data) {

            jQuery('#goods-pod_category_id').html(data);
        }
    });
}