var mycar = mycar || {};

mycar = {
  init: function() {

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
