!function(e){function n(){var n=e(window).scrollTop();n>=100&&!e(".header, .main-menu").hasClass("is-visible")?e(".header, .main-menu").delay(250).addClass("is-visible"):100>n&&e(".header, .main-menu").removeClass("is-visible"),n>i&&n>=100?e(".header, .main-menu").addClass("is-hidden"):e(".header, .main-menu").removeClass("is-hidden"),i=n}var a,i=0;e(window).on("scroll",function(){a=!0}),setInterval(function(){a&&(n(),a=!1)},250),e(".menu-button").on("click",function(){return e(".header").toggleClass("menu-is-open"),e(".main-menu").toggleClass("is-open"),!1}),e("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var n=e(this.hash);n=n.length?n:e("[name="+this.hash.slice(1)+"]"),n.length&&e("html,body").animate({scrollTop:n.offset().top-100},1e3)}})}(jQuery);