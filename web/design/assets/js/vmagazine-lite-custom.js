/**
 * vmagazine Custom JS
 *
 * @package AccessPress Themes
 * @subpackage Vmagazine
 * @since 1.0.0
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */
jQuery(document).ready(function($) {
  "use strict";


var lazyLoad = "enable";
if(lazyLoad === "enable"){
 $('.lazy').Lazy();
}

/**
* Youtube Video scrollbar
*
*/
$(window).on("load", function () {
  $('.vmagazine-lite-yt-player .vmagazine-lite-video-thumbnails,.sidebar-wrapper').mCustomScrollbar({
    theme: "dark",
    scrollInertia: 500
  });

$('.vmagazine-lite-fullwid-slider .posts-tab-wrap').mCustomScrollbar({
    //theme: "dark"
    scrollInertia: 500

  });

});

/**
* Sticky sidebar
*
*/
 $('#secondary, #secondary-left').theiaStickySidebar({
      // Settings
      additionalMarginTop: 30
    });

/**
* Fixed Header
*
*/
/*position fixed-menu on scroll*/
    
if( $('.site-header').hasClass('header-layout3') ){
  var hdrOuter = '.site-header.header-layout3';
  var fixHandle = '.site-header .site-main-nav-wrapper';    
}else{
  var hdrOuter = '.site-header .vmagazine-lite-nav-wrapper';
  var fixHandle = '.site-header .vmagazine-lite-nav-wrapper';
}

//sticky menuy for mobile device
if ($(window).width() <= 768){

    var hdrOuter = '.vmagazine-lite-mob-outer';
    var fixHandle = '.vmagazine-lite-mob-outer';
}

  var getHeaderHeight = $(hdrOuter).outerHeight();
  var lastScrollPosition = 0;
  
  $(window).scroll(function() {
    var currentScrollPosition = $(window).scrollTop();
    
    if ($(window).scrollTop() > 2.3 * (getHeaderHeight) ) {

      $(fixHandle).addClass('menu-fixed-triggered');

      if (currentScrollPosition > lastScrollPosition) {
      $(fixHandle).removeClass('menu-fixed');
      }else{
        $(fixHandle).addClass('menu-fixed');
      }
      lastScrollPosition = currentScrollPosition;
    } else {
      $(fixHandle).removeClass('menu-fixed');
      $(fixHandle).removeClass('menu-fixed-triggered');
    }
    
  });


 //Fix audio and video size
$(".vmagazine-lite-content").fitVids();
$(".vmagazine-lite-content,.player-inner").fitVids({
    customSelector: "iframe[src^='https://w.soundcloud.com']"
});

/**
* Post Gallery preetyphoto
*
*/
 $(".gallery-items a,.shortcode-gallery .gallery_wrap a,.gallery-item div a").prettyPhoto({
    social_tools: false,
    theme: 'facebook'
 });

/* 
* Full width Slider
*
* 
*/



/**
* Back to top button
*/
$('.scrollup').hide();
var offset = 250;
var duration = 300;
$(window).scroll(function() {
    if ($(this).scrollTop() > offset) {
        $('.scrollup').fadeIn(duration);
    } else {
        $('.scrollup').fadeOut(duration);
    }
});
$('body').on('click', '.scrollup', function () {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, duration);
    return false;
})


/**
* Ajax search function
*
*/
// var ajaxEnable = vmagazine_lite_ajax_script.ajax_search;
// if( ajaxEnable == 'show' ){
//
//   $('body').on('focusout', '.site-header input[type="search"],.vmagazine-lite-mobile-search-wrapper input[type="search"]', function () {
//     $('body').on('click', '.site-header:not(.search-content),.vmagazine-lite-mobile-search-wrapper:not(.search-content)', function () {
//           $('.site-header .search-content,.vmagazine-lite-mobile-search-wrapper .search-content').hide();
//       });
//     });
//
//   $('.site-header input[type="search"],.vmagazine-lite-mobile-search-wrapper input[type="search"]').on('keyup',function(){
//     $('.site-header .search-content,.vmagazine-lite-mobile-search-wrapper .search-content').html('');
//
//     var searVal = $(this).val();
//     if( searVal.length >= 2 ){
//       $('.site-header .search-content,.vmagazine-lite-mobile-search-wrapper .search-content').show();
//       var dis = $(this);
//       var keyword = $(this).val();
//
//       $('.site-header,.vmagazine-lite-mobile-search-wrapper').find('.block-loader').show();
//        // $.ajax({
//        //          url :vmagazine_lite_ajax_script.ajaxurl,
//        //          data:{
//        //                action : 'search_function',
//        //                key:  keyword,
//        //              },
//        //          type:'post',
//        //          success: function(res){
//        //                  $('.site-header .search-content,.vmagazine-lite-mobile-search-wrapper .search-content').html(res);
//        //                  $('.site-header .ajax-search-view-all:not(:last),.vmagazine-lite-mobile-search-wrapper .ajax-search-view-all:not(:last)').remove();
//        //                  $('.site-header .block-loader,.vmagazine-lite-mobile-search-wrapper .block-loader').hide();
//        //              }
//        //      });
//     }
//
//   });
//
// }

/* --------------------------------------------------------------------------------------------------------------------------- */

/*===========================================================================================================*/
/**
  * Tab cat slider
  * 
  * vmagazine-lite-slider-tab-carousel
  */

  /**
  * Category slider
  */

  $('.widget-cat-slider').lightSlider({
    item:1,
    slideMargin:0,
    loop:false,
    controls:true,
    enableDrag:true,
    speed: 700,
    onSliderLoad: function() {
           $('.widget-cat-slider').removeClass( 'cS-hidden' );
       }
  });

  
  /**
   * Featured slider
   */
  $('.featuredSlider').lightSlider({
    item:1,
    slideMargin:0,
    enableDrag:true,
    loop:true,
    pager:true,
    pagerHtml: true,
    auto:true,
    speed: 700,
    pause: 4200,
    onSliderLoad: function() {
           $('.featuredSlider').removeClass( 'cS-hidden' );
           
       }
    });
 

  /*
   * Post format gallery
   */
  $('.meta-gallery').lightSlider({
    adaptiveHeight:true,
    item:1,
    slideMargin:0,
    enableDrag:true,
    loop:true,
    pager:false,
    controls:true,
    prevHtml:'<span class="prev">Prev</span>',
    nextHtml: '<span class="next">Next</span>',
    auto:true,
    speed: 700,
    pause: 4200,
    onSliderLoad: function() {
           $('.meta-gallery').removeClass( 'cS-hidden' );

       }
  });

/** 
* Adds class on search focus 
* 
**/
$('body').on('focus', '.site-header.header-layout1 input[type="search"]', function () { 
  $('.search-form').addClass('focus');
});

$('body').on('focusout', '.site-header.header-layout1 input[type="search"]', function () { 
  $('.search-form').removeClass('focus');
});




/**
* Search focus on mobile 
* 
*/
$('body').on('focus','.vmagazine-lite-mobile-search-wrapper input[type="search"]', function(){
  $('.vmagazine-lite-mobile-search-wrapper .mob-search-form').addClass('focus');
});
$('body').on('focusout','.vmagazine-lite-mobile-search-wrapper input[type="search"]', function(){
  $('.vmagazine-lite-mobile-search-wrapper .mob-search-form').removeClass('focus');
});

  /**
  * Mobile navigation toggles
  * 
  */
  //Mobile Navigation toggle
  $('body').on('click touchstart', '.nav-toggle', function () { 
      $('.mobile-navigation').addClass("on");
      $('body').addClass('mob-menu-enabled');
  });
  
  $('body').on('click touchstart', '.nav-close', function () {
      $('.mobile-navigation,.mob-search-form').removeClass("on");
      $('body').removeClass('mob-menu-enabled');
      $('body').removeClass('mob-search-enabled');
  });
  /* Mobile Search toggle **/
  $('body').on('click touchstart', '.mob-search-icon', function () {
      $('.mob-search-form').addClass("on");
      $('body').addClass('mob-search-enabled');
  });

/**
* Vmagazine Mobile sub-menu
*
*/
$('.vmagazine-lite-mobile-navigation-wrapper .menu-mmnu-container ul li ul').hide();

$('<div class="sub-toggle"></div>').insertBefore('.vmagazine-lite-mobile-navigation-wrapper .menu-item-has-children ul');
$('<div class="sub-toggle-children"></div>').insertBefore('.vmagazine-lite-mobile-navigation-wrapper .page_item_has_children ul');



$('body').on('click touchstart','.vmagazine-lite-mobile-navigation-wrapper .sub-toggle', function()  {
  $(this).next('ul.sub-menu').slideToggle();
  $(this).parent('li').toggleClass('mob-menu-toggle');
});

$('body').on('click touchstart','.vmagazine-lite-mobile-navigation-wrapper .sub-toggle-children',function() {
    $(this).next('ul').slideToggle();
});


/** wow animations **/
var enableAnim = "enable";
if( enableAnim == 'enable' ){
  var wow = new WOW();
  wow.init();
}



  /**
  * News ticker 
  */


 
});    