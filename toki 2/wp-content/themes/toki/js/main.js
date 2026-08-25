
//loader
$(function() {
  $('.loader-container').fadeOut(1000);
})


// category nice select

$(document).ready(function() {
  $('select.nice-select').niceSelect();
});



// eight categories carousel section

$(function(){
  
  var is_rtl = $("html[lang='ar']").length > 0;
    
  $('.eight_items_carousel').slick({
    infinite: true,
    slidesToShow: 8,
    slidesToScroll: 1,
    rtl: is_rtl,
    dots: false,
    arrows: true,
    nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-left"></i></button>',
  	prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-right"></i></button>',
    loop: true,
    autoplay: true,
    autoplaySpeed: 4000,
    rows: 2,
    responsive: [{

      breakpoint: 1200,
      settings: {
        slidesToShow: 6,
        infinite: true
      }

    }, {

      breakpoint: 991,
      settings: {
        slidesToShow: 5,
        dots: true,
        rows: 2
      }

    }, {

      breakpoint: 576,
      settings: {
        slidesToShow: 4,
        dots: true,
        rows: 2
      }

    }
  ]
  });
});

// scroll top button
$(function () {

  var scrollButton = $('.go-top');

  $(window).scroll(function () {

    if($(window).scrollTop() >= 500) {
      scrollButton.show();
    }else {
      scrollButton.hide();
    }
  });

  scrollButton.click(function () {
    $('html, body').animate({scrollTop: 0});
  })
});

// add to favourite product

$(document).on('click', '.add_to_fav', function() {
  $(this).children('.add_to_fav i').toggleClass('fa-regular fa-solid orange__add');
});



// footer collapse

var $window = $(window);

if ($window.width() < 992) {
  $(document).on('click', '.footer__title__wrapper', function() {
      $(this).siblings('.footer_menu').slideToggle(500);
      $(this).find('i').toggleClass('fa-plus fa-minus');
  });
}


// seven categories page carousel

$(function(){
  
  var is_rtl = $("html[lang='ar']").length > 0;
    
  $('.seven_items_carousel').slick({
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 7,
    rtl: is_rtl,
    dots: false,
    arrows: true,
    nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-left"></i></button>',
  	prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-right"></i></button>',
    loop: true,
    autoplay: false,
    autoplaySpeed: 4000,
    responsive: [{

      breakpoint: 1200,
      settings: {
        slidesToShow: 6,
        infinite: true
      }

    }, {

      breakpoint: 991,
      settings: {
        slidesToShow: 5,
        arrows: false,
      }

    }, {

      breakpoint: 576,
      settings: {
        slidesToShow: 4,
        arrows: false,
      }

    }
  ]
  });
});


// seven brands carousel

$(function(){
  
  var is_rtl = $("html[lang='ar']").length > 0;
    
  $('.brands_items_carousel').slick({
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 2,
    rtl: is_rtl,
    dots: false,
    arrows: false,
    nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-left"></i></button>',
  	prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-right"></i></button>',
    loop: true,
    autoplay: false,
    autoplaySpeed: 4000,
    responsive: [{

      breakpoint: 1200,
      settings: {
        slidesToShow: 6,
        infinite: true
      }

    }, {

      breakpoint: 991,
      settings: {
        slidesToShow: 5,
        arrows: false,
      }

    }, {

      breakpoint: 576,
      settings: {
        slidesToShow: 2,
        arrows: false,
      }

    }
  ]
  });
});


// more categories carousel section

$(function(){
  
  var is_rtl = $("html[lang='ar']").length > 0;
    
  $('.more__items__carousel').slick({
    infinite: true,
    slidesToShow: 8,
    slidesToScroll: 1,
    rtl: is_rtl,
    dots: false,
    arrows: false,
    loop: true,
    autoplay: true,
    autoplaySpeed: 4000,
    responsive: [{

      breakpoint: 1200,
      settings: {
        slidesToShow: 6,
        infinite: true
      }

    }, {

      breakpoint: 991,
      settings: {
        slidesToShow: 5,
        dots: false
      }

    }, {

      breakpoint: 576,
      settings: {
        slidesToShow: 4,
        dots: false
      }

    }
  ]
  });
});


// product  plus and minus
var numberSpinner = (function() {
  $('.number__spinner>.ns-btn>a').click(function() {
    var btn = $(this),
      oldValue = btn.closest('.number__spinner').find('input').val().trim(),
      newVal = 0;

    if (btn.attr('data-dir') === 'up') {
      newVal = parseInt(oldValue) + 1;
    } else {
      if (oldValue > 1) {
        newVal = parseInt(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    btn.closest('.number__spinner').find('input').val(newVal);
  });
 
})();



// product details carousel

$(function(){
  
  var is_rtl = $("html[lang='ar']").length > 0;
    
  $('.pro__details__slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    rtl: is_rtl,
    dots: false,
    arrows: false,
    loop: true,
    autoplay: true,
    autoplaySpeed: 4000,
    responsive: [{

      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        infinite: true
      }

    }, {

      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        dots: false
      }

    }, {

      breakpoint: 576,
      settings: {
        slidesToShow: 2,
        dots: false
      }

    }
  ]
  });
});

// features slider section

$(function(){
  
  var is_rtl = $("html[lang='ar']").length > 0;
    
  $('.features__SsliderO').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    margin: 15,
    rtl: is_rtl,
    dots: false,
    arrows: false,
    loop: true,
    autoplay: true,
    autoplaySpeed: 4000,
    responsive: [{

      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        infinite: true
      }

    }, {

      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        dots: false
      }

    }, {

      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        dots: false
      }

    }
  ]
  });
});