var mycar = mycar || {};

mycar = {
  init: function() {

  },

  setImageFormat: function() {
    var maxLandscapeHeight = 0;

    $('.c-image-gallery__single img').each(function(i){
      var width   = $(this).width();
      var height  = $(this).height();

      // Landscape
      if(width >= height){
        $(this).css('width', '100%');

        // get tallest landspace to then apply to portrait image
        maxLandscapeHeight = maxLandscapeHeight > height ? maxLandscapeHeight : height;
        console.log('max',maxLandscapeHeight);

      }else { // Portrait
        $(this).addClass('gallery-portrait');
        $(this).css('height', '100%');
      }
      // console.log(i + ' ' + height);
      // console.log(i + ' ' + width);
    });
    $('.gallery-portrait').css('max-height', maxLandscapeHeight + 'px');
  }
};


mycar.menuPopUp = {
  init: function(clicked) {
    // Incase not signed up yet cta is pressed inside the popup
    this.closePopup();

    this.findPopup(clicked);
  },

  findPopup:function(clicked) {
    if(clicked.hasClass('js-header-contact')){
      this.addActive('.js-contact-popup');

    }else if (clicked.hasClass('js-header-signin')){
      this.addActive('.js-signin-popup');

    }else if(clicked.hasClass('js-header-signup')){
      this.addActive('.js-signup-popup');

    }else if(clicked.hasClass('js-page-video')){
      this.addActive('.js-video-popup');

    }else if(clicked.hasClass('js-page-email')){
      this.addActive('.js-email-popup');
    }
  },

  addActive: function(name) {
    $(name).addClass('active');
    $('body').addClass('pop-up-active');
    setTimeout(function(){
      $(name).fadeIn();
    }, 500)
  },

  closePopup: function() {
    $('body').removeClass('pop-up-active');
    $('.c-popup.active').fadeOut();
  }
};



// Various triggers

$('.js-popup').on('click', function() {
  mycar.menuPopUp.init($(this));
});


$('.js-popup-close').on('click', function() {
  mycar.menuPopUp.closePopup();
});

var sliderCount = $('.c-image-gallery-for > div').length;

// Slick init
$('.c-image-gallery').slick({
 slidesToShow: 1,
 slidesToScroll: 1,
 arrows: false,
 fade: true,
 asNavFor: '.c-image-gallery-nav'
});


$('.c-image-gallery-nav').slick({
 slidesToShow: 4,
 slidesToScroll: 1,
 asNavFor: '.c-image-gallery',
 dots: false,
 focusOnSelect: true,
 arrows: false,
 responsive: [
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
              }
            }
          ]
});

$(document).ready(function(){
  if( $('.c-image-gallery').hasClass('slick-initialized') ) {
    mycar.setImageFormat();
  }
});
