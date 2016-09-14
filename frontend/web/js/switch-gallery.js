jQuery(document).ready(function () {
    jQuery('.act').bootstrapSwitch('state', true, true);
    jQuery('.non-act').bootstrapSwitch('state', false, true);

    jQuery('.act').on('switchChange.bootstrapSwitch', function (event, state) {
        var id = jQuery(this).attr('id');
        //alert(id + ' : ' + state + '| ' + event); // true | false
        sendDataToSlider(id,state);
    });
    jQuery('.non-act').on('switchChange.bootstrapSwitch', function (event, state) {
        var id = jQuery(this).attr('id');
        //alert(id + ' : ' + state + '| ' + event); // true | false
        sendDataToSlider(id,state);
    });
});
function sendDataToSlider(id,state){
    //alert(1);
    var csrf_token = jQuery("meta[name=csrf-token]").attr("content");
    jQuery.ajax({
        url: '/gallery/change-activety',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            id: id,
            state:state
        },
        beforeSend: function (xhr) {
            jpreloader('show');
        },
        success: function (data) {
            jpreloader('hide');
            //alert(data.id +' | '+ data.state);
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