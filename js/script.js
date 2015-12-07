/*
   Creative Anchor Scripts
   =========================
   Author: Pralie Dutzel
   Website: praliedutzel.com
*/

(function($) {

   // Header scroll effects
   var userScrolled;
   var lastScrollTop = 0;

   $(window).on('scroll', function() {
      userScrolled = true;
   });

   setInterval(function() {
      if (userScrolled) {
         hasScrolled();
         userScrolled = false;
      }
   }, 250);

   function hasScrolled() {
      var scrollDistance = $(window).scrollTop();

      if ((scrollDistance >= 100) && (!$('.header, .main-menu').hasClass('is-visible'))) {
         $('.header, .main-menu').delay(250).addClass('is-visible');
      }
      else if (scrollDistance < 100) {
         $('.header, .main-menu').removeClass('is-visible');
      }

      if ((scrollDistance > lastScrollTop) && (scrollDistance >= 100)) {
         $('.header, .main-menu').addClass('is-hidden');
      }
      else {
         $('.header, .main-menu').removeClass('is-hidden');
      }
      lastScrollTop = scrollDistance;
   }


   // Mobile navigation handler
   $('.menu-button').on('click', function() {
      $('.header').toggleClass('menu-is-open');
      $('.main-menu').toggleClass('is-open');
      return false;
   });


   // Smooth scrolling for page links
   $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
         var target = $(this.hash);
         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
         if (target.length) {
            $('html,body').animate({
               scrollTop: target.offset().top - 100
            }, 1000);
         }
      }
   });
   

})(jQuery);