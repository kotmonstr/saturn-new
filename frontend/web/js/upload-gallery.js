function sendfile() {
    var fd = new FormData(document.getElementById("form-send-file"));
    fd.append("CustomField", "This is some extra data");
    $.ajax({
        url: "/gallery/submit-multy",
        type: "POST",
        data: fd,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        beforeSend: function (xhr) {
            jpreloader('show');
        },
        done: function (data) {
            //alert(data.result);
            //console.log(data.result);
            jpreloader('hide');


        },


    });

    /* Preloader */
    function jpreloader(item) {
        if (item == 'show') {
            $(document.body).append('<div class="back_background jpreloader" style="z-index: 90000;"></div>');
        } else {
            $('.jpreloader').remove();
        }
    }

}
function ShowFullImage(name) {

    $('.photo-preview').addClass('active');
    $('#image-inside').html('<img id="temp" data-name="' + name + '" src="/upload/multy-big/' + name + '" alt="" height="100%" width="100%" z-index="998"><div><a href="javascript:void(0);" onclick="Delete()" class="btn btn-warning btn-delete-image"> Удалить</a></div>');
}
function HideFullImage() {

    $('#image-inside').html('');
    $('.photo-preview').removeClass('active');
}
function Delete() {

    var name = $('#temp').attr('data-name');
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/slider-photo/delete-photo',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            name: name
        },
        beforeSend: function (xhr) {
            jpreloader('show');
        },
        complete: function (data) {

            var csrf_token = $("meta[name=csrf-token]").attr("content");
            $.ajax({
                url: '/slider-photo/get-photo',
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: {
                    _csrf: csrf_token
                },
                success: function (data) {
                    $('.photo-target').html(data);
                    $('.photo-preview').removeClass('active');
                    jpreloader('hide');
                },
//                complete: function (data) {
//                    $('.photo-target').html(data);
//                }
            });
        }
    });
    ;
    /* Preloader */
    function jpreloader(item) {
        if (item == 'show') {
            $(document.body).append('<div class="back_background jpreloader" style="z-index: 90000;"></div>');
        } else {
            $('.jpreloader').remove();
        }
    }
}

function ChangeButton() {
    //alert($('#gallery-album_id').val());
    if ($('#gallery-album_id').val() > 0) {
        $('.send-file-submit').attr('disabled',false);
     } else {
        $('.send-file-submit').attr('disabled',true);
    }
};
