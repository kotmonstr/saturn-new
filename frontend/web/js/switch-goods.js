jQuery(document).ready(function () {

    jQuery('.act').bootstrapSwitch('state', true, true);
    jQuery('.non-act').bootstrapSwitch('state', false, true);

    jQuery('.act').on('switchChange.bootstrapSwitch', function (event, state) {
        var id = jQuery('#goods-id').val();
        //alert(id + ' : ' + state + '| ' + event); // true | false
        sendDataToSlider(id,state);
    });
    jQuery('.non-act').on('switchChange.bootstrapSwitch', function (event, state) {
        var id = jQuery('#goods-id').val();
        //alert(id + ' : ' + state + '| ' + event); // true | false
        sendDataToSlider(id,state);
    });
});
function sendDataToSlider(id,state){
    //alert(1);
    var csrf_token = jQuery("meta[name=csrf-token]").attr("content");
    jQuery.ajax({
        url: '/goods/change-activety',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            id: id,
            state:state
        },
        success: function (data) {
            //alert(data.id +' | '+ data.state);
        }
    });
}