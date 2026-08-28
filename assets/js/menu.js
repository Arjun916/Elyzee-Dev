/***************************************************
==================== JS INDEX ======================
****************************************************

  // Data Css js
  // sticky header
  // Register GSAP Plugins
  // Smooth active
  // Preloader
  // Side Info Js
  // meanmenu activation 
  // Counter active
  // Magnific Video popup
  // Image Reveal Animation
  // testimonial slider
  // text slider 
  // client slider 
  // GSAP Fade Animation 
  // Text Invert With Scroll 
  // Pin Active
  // grow animation 
  // go full width 
  // scale animation 
  // cta text animation 
  // hover reveal start
  // go-visible animation 
  // video Active
  // Moving text		
  // Moving Gallery		
  // moving testimonial 
  // capability hover active 
  // video start
  // text-animation start
  // service-area-2 text and bg animation start
  // work-area-2 box animation start
  // hover reveal image animation 
  // GSAP hover animations for .text-underline elements
  // Client Pin Active
  // about 3 thumb animation 
  // GSAP title animation
  // Animation Word
  // Full Character Setup 
  // approach-area
  // approach-area service details page
  // button animation
  // service-area-4
  // service-area-4 image
  // portfolio-slide
  // portfolio-slide-2
  // portfolio-slide-3
  // portfolio-slide-4
  // portfolio-slide-5
  // parallax
  // woking card
  // circle Animation
****************************************************/

(function ($) {
  "use strict";

  var windowOn = $(window);
 

  // Preloader
  $(document).ready(function () {

  // sticky header
  function pinned_header() {
    var lastScrollTop = 0;

    windowOn.on('scroll', function () {
      var currentScrollTop = $(this).scrollTop();
      if (currentScrollTop > lastScrollTop) {
        $('.header-sticky').removeClass('sticky');
        $('.header-sticky').addClass('transformed');
      } else if ($(this).scrollTop() <= 500) {
        $('.header-sticky').removeClass('sticky');
        $('.header-sticky').removeClass('transformed');
      } else {
        $('.header-sticky').addClass('sticky');
        $('.header-sticky').removeClass('transformed');
      }
      lastScrollTop = currentScrollTop;
    });
  }
  pinned_header();

  



  // Side Info Js
  $(".side-info-close,.offcanvas-overlay").on("click", function () {
    $(".side-info").removeClass("info-open");
    $(".offcanvas-overlay").removeClass("overlay-open");
  });
  $(".side-toggle").on("click", function () {
    $(".side-info").addClass("info-open");
    $(".offcanvas-overlay").addClass("overlay-open");
  });

  $(window).scroll(function () {
    if ($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
      $(".side-info").removeClass("info-open");
      $(".offcanvas-overlay").removeClass("overlay-open");
    }
  });




 
  });

})(jQuery);

