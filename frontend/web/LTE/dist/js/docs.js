/*
 * Documentation JS script
 */
jQuery(function () {
  var slideToTop = jQuery("<div />");
  slideToTop.html('<i class="fa fa-chevron-up"></i>');
  slideToTop.css({
    position: 'fixed',
    bottom: '20px',
    right: '25px',
    width: '40px',
    height: '40px',
    color: '#eee',
    'font-size': '',
    'line-height': '40px',
    'text-align': 'center',
    'background-color': '#222d32',
    cursor: 'pointer',
    'border-radius': '5px',
    'z-index': '99999',
    opacity: '.7',
    'display': 'none'
  });
  slideToTop.on('mouseenter', function () {
    jQuery(this).css('opacity', '1');
  });
  slideToTop.on('mouseout', function () {
    jQuery(this).css('opacity', '.7');
  });
  jQuery('.wrapper').append(slideToTop);
  jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() >= 150) {
      if (!jQuery(slideToTop).is(':visible')) {
        jQuery(slideToTop).fadeIn(500);
      }
    } else {
      jQuery(slideToTop).fadeOut(500);
    }
  });
  jQuery(slideToTop).click(function () {
    jQuery("body").animate({
      scrollTop: 0
    }, 500);
  });
  jQuery(".sidebar-menu li:not(.treeview) a").click(function () {
    var jQuerythis = jQuery(this);
    var target = jQuerythis.attr("href");
    if (typeof target === 'string') {
      jQuery("body").animate({
        scrollTop: (jQuery(target).offset().top) + "px"
      }, 500);
    }
  });
  //Skin switcher
  var current_skin = "skin-blue";
  jQuery('#layout-skins-list [data-skin]').click(function(e) {
    e.preventDefault();
    var skinName = jQuery(this).data('skin');
    jQuery('body').removeClass(current_skin);
    jQuery('body').addClass(skinName);
    current_skin = skinName;
  });
});
