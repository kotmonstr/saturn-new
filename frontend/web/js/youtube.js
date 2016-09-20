function sendYoutubeCode() {
    console.log('sendYoutubeCode');
    var code = $('#video-youtube_id').val();

    var csrf_token = $("meta[name=csrf-token]").attr("content");
    //alert(csrf);
    $.ajax({
        type: "POST",
        url: '/video/send-youtube-code',
        data: ({
            code: code,
            _csrf: csrf_token
        }),
        success: function (data) {
            $('#video-title').val(data.title).attr('disabled',false);
            $('#video-descr').val(data.descr).attr('disabled',false);
            $('.info').html('<img src="'+ data.imageSrc+'" height="100px" >');

        }

    });
}



$( document ).ready(function() {

    if ($("div").is(".alert") ) {
  
        setTimeout(function () {
           $(".alert").fadeOut('slow');
            $(".alert").fadeOut('slow');
        }, 3000);
    }

    
  
});
  
