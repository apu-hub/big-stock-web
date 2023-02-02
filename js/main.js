// Basic initialization is like this:
// $('.your-class').slick();

// I added some other properties to customize my slider
// Play around with the numbers and stuff to see
// how it works.
var $jq = jQuery.noConflict();

$jq('.slick-carousel').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  speed: 300,
  infinite: true,
  autoplaySpeed: 5000,
  autoplay: true,
  responsive: [
{
  breakpoint: 991,
  settings: {
    slidesToShow: 3,
  }
},
{
  breakpoint: 767,
  settings: {
    slidesToShow: 2,
  }
}
]
});

      
    
      
// Fancybox Configuration
$jq('[data-fancybox="gallery"]').fancybox({
    buttons: [
      "slideShow",
      "thumbs",
      "zoom",
      "fullScreen",
      "share",
      "close"
    ],
    loop: false,
    protect: true
  });
  



