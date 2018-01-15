$(function() {

  // Responsive width for Form login
  $(window).resize(function () {

    var formLoginWidth = $('.header__login').width() + $('.header__support').width();
    if ($(window).width() < 584) {
      $('.head-login__form').width(formLoginWidth/2);
    } else {
      $('.head-login__form').width(formLoginWidth);
    }
  }).resize();

  setTimeout(function () {$(window).resize();}, 100);

  /* Show/Hide Form login */
  $('.head-login__btn-login').click(function() {
    $('.head-login__form').toggleClass('is-visible');
  });


  // Moving .header__login and .header__support 
  enquire.register('screen and (max-width: 850px)', {
    match: function() {
      $('.header__login').appendTo('.header__top .container');
    },
    unmatch: function() {
      $('.header__support').appendTo('.header__top .container');
    }
  });


  /* Main Slider */
  $('.intro__slider').slick({
    dots: false,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 5000,
    arrows: false
  });

  /* Reviews carousel */
  $('.reviews__list').slick({
    dots: true,
    arrows: false,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [{
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });

  // Offers slider
  (function() {
    var offersSlider;
    enquire.register('screen and (max-width: 992px)', {
      match: function() {
        offersSlider = $('.offers__slider').slick({
          dots: true,
          arrows: false,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1
        });
      },
      unmatch: function() {
        offersSlider.slick('unslick');
      }
    });
  })();

  // Moving a menu for the mobile version and back 
  enquire.register('screen and (max-width: 550px)', {
    match: function() {
      $('.nav').prependTo('body').addClass('nav--mobile');
    },
    unmatch: function() {
      $('.nav').appendTo('.header__menu').removeClass('nav--mobile');
    }
  });

  // Swap mobile menu
  $('.nav').slideAndSwipe();

  /* Close mobile menu */
  $('.nav__close, .ssm-overlay').click(function(e) {
    e.preventDefault();
    $('.nav').css({'transform' : 'translate(-280px,0)'}).removeClass('ssm-nav-visible');
    $('.ssm-overlay').hide();
    $('html').toggleClass('is-navOpen');
  });

  /*  */
  $('.menu__item.has-dropdown .menu__link').click(function(e) {
    e.preventDefault();
    $(this).parent().toggleClass('active');
    $(this).siblings('.menu-dropdown').toggleClass('is-visible');
  });

  if ( $('html').hasClass('is-navOpen') ) {
    document.addEventListener('touchmove', function(e) {e.preventDefault();}, true);
  }

});
