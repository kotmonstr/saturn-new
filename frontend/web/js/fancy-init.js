
    jQuery(document).ready(function() {
        jQuery(".fancybox").fancybox(
            {
                maxWidth	: 800,
                maxHeight	: 600,
                fitToView	: false,
                width		: '70%',
                height		: '70%',
                autoSize	: false,
                closeClick	: false,
                openEffect	: 'none',
                closeEffect	: 'none',
                helpers	: {
                    title	: {
                        type: 'outside'
                    },
                    thumbs	: {
                        width	: 50,
                        height	: 50
                    }
                }
            }
        );
    });
