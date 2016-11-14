
    jQuery(document).ready(function() {
        jQuery(".fancybox").fancybox(
            {
                maxWidth	: 1000,
                maxHeight	: 800,
                fitToView	: true,
                width		: '70%',
                height		: '70%',
                autoSize	: true,
                closeClick	: false,
                openEffect	: 'none',
                closeEffect	: 'none',
                helpers	: {
                    title	: {
                        type: 'outside'
                    },
                    thumbs	: {
                        width	: 150,
                        height	: 150
                    }
                }
            }
        );
    });
