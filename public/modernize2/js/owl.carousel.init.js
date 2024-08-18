$('.owl-carousel').owlCarousel({
   loop: true,
   center: true,
   items: 3,
   margin: 10,
   autoplay: true,
   dots: false,
   nav: false,
   autoplayTimeout: 5000,
   smartSpeed: 450,
   responsive: {
      0: {
         items: 1,
      },
      600: {
         items: 2,
      },
      1000: {
         items: 3,
      }
   }
});