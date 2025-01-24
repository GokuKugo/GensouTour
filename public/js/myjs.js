
$('.slider').slick({
  dots: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4500,
  speed: 1500,
  centerMode: true,
  variableWidth: true,
  arrows: false,
  pauseOnFocus: false,
 /*  swipe: false */
});

$('.photoslider').slick({
  dots: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 0,
  speed: 12000,
  cssEase:'linear',
  centerMode: false,
  variableWidth: true,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover:false,
  focusOnSelect: false,
});


$('.artistslider').slick({
  autoplaySpeed: 2000,
  variableWidth: true,
  arrows: true,
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  centerMode: true,

});
$('.shopslider').slick({
  dots: false,
  arrows:true,
  infinite: false,
  speed: 700,
  slidesToShow: 4,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 576,
      settings: {
        arrows:false,
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
    {
        breakpoint: 768,
        settings: {
        arrows:false,
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },

  ]
});

