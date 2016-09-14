      $(document).ready(function(){
        //  $('.bxslider').bxSlider({
        //    infiniteLoop: false,
        //    hideControlOnEnd: true
        //  });

         $('#homepageButton').on("click", function(e) {

            var fullname = $('[name="full_name"]');
            email = $('[name="e_mail"]');
            phone = $('[name="phone_num"]');
            wed_date = $('[name="wedding_date"]');

            if ( fullname.val() == '' || fullname.val() == fullname.attr('placeholder') ) {
                $(".confirm-msg").text("Please enter your full name.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 15px 35px 15px", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                fullname.focus();
            }
            else if( fullname.val().length > 200 )  {
                $(".confirm-msg").text("The name you have entered is too long. Please shorten it.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 15px 35px 15px", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                fullname.focus();
                fullname.select();
            }
            else if( email.val() == '' || email.val() == email.attr('placeholder') )  {
                $(".confirm-msg").text("Please enter your email address.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 15px 35px 15px", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                email.focus();
            }
            else if( email.val().length > 255 || email.val().indexOf('@') == -1 || email.val().indexOf('.') == -1 ) {
                $(".confirm-msg").text("Please enter a valid email address.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 15px 35px 15px", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                email.focus();
                email.select();
              }
            else if ( phone.val() != '' && phone.val().length > 55 )  {
                $(".confirm-msg").text("Please enter a valid telephone number.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 15px 35px 15px", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                phone.focus();
              }
            else  {
               // $.post( "submit_form.php", { name: fullname, email: email, phone: phone, wed_date: wed_date });

				$.ajax({
				  method: "POST",
				  url: "php/get_in_touch.php",
				  data: {  name: fullname.val(), email: email.val(), phone: phone.val(), wed_date: wed_date.val() }
				})
				  .done(function( msg ) {

				  });
                $(".confirm-msg").text("Thanks for your enquiry. We will get back to you as soon as possible.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 15px 35px 15px", "background-color": "#69A565", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
            }
            return e.preventDefault();
         });
      });

//WEEKDAY WEDDING POPUP FORM

  $("#weekdayWeddingsForm .pop_upbtn").click(function(e) {

        e.preventDefault();
        var email = $(this).parents('form').children('.firstpop_uptext');


    if( email.val() == '' || email.val() == email.attr('placeholder') )  {
                $(".confirm-msg-wed").text("Please enter your email address.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 0px 15px 0px", "text-align": "center", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                email.focus();
            }
            else if( email.val().length > 255 || email.val().indexOf('@') == -1 || email.val().indexOf('.') == -1 ) {
                $(".confirm-msg-wed").text("Please enter a valid email address.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 0px 15px 0px", "text-align": "center", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                email.focus();
                email.select();
              }

        else
        {

        $.ajax({
          method: "POST",
          url: "php/weekday_weddings.php",
          data: { email: email.val()}
        })
          .done(function( msg ) {
           $('.popup-close').trigger('click');
          });
        }
       });

      //EDITING STYLE POPUP FORM

  $("#editingStyleForm .pop_upbtn").click(function(e) {

        e.preventDefault();
        var email = $(this).parents('form').children('.firstpop_uptext');


    if( email.val() == '' || email.val() == email.attr('placeholder') )  {
                $(".confirm-msg-wed").text("Please enter your email address.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 0px 15px 0px", "text-align": "center", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                email.focus();
            }
            else if( email.val().length > 255 || email.val().indexOf('@') == -1 || email.val().indexOf('.') == -1 ) {
                $(".confirm-msg-wed").text("Please enter a valid email address.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 0px 15px 0px", "text-align": "center", "background-color": "#C76D6D", "font-weight": "700", "font-size": "17px"}).fadeIn(1500);
                email.focus();
                email.select();
              }

        else
        {

        $.ajax({
          method: "POST",
          url: "php/editing_styles.php",
          data: { email: email.val()}
        })
          .done(function( msg ) {
           $('.popup-close').trigger('click');
          });
        }
       });

//CONTACT FORM MAIL

         $('.sendMessage').on("click", function(e) {
          // debugger;
         $(".confirm-msg").text('');
            var fullname = $('input[name="full_name"]');
            email = $('input[name="e_mail"]');
            message = $('textarea[name="contact_message"]');
            optradios = $('input[name="optradio"]:checked');
            wed_date = $('input[name="wed_date"]');
      phone = $('input[name="phone"]');
      cer_venue = $('input[name="c_venue"]');
      rec_venue = $('input[name="r_venue"]');
      hearabouts = $(":selected").text();
      //non-validated values
      // alert(hearabouts);

            if ( fullname.val() == '' || fullname.val() == fullname.attr('placeholder') ) {
                $(".confirm-msg").text("Please enter your full name.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px", "background-color": "#C76D6D", "font-weight": "700", "font-style": "italic", "font-size": "17px"}).fadeIn(1500);
                fullname.focus();
            }
            else if( fullname.val().length > 200 )  {
                $(".confirm-msg").text("The name you have entered is too long. Please shorten it.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px", "background-color": "#C76D6D", "font-weight": "700", "font-style": "italic", "font-size": "17px"}).fadeIn(1500);
                fullname.focus();
                fullname.select();
            }
            else if( email.val() == '' || email.val() == email.attr('placeholder') )  {
                $(".confirm-msg").text("Please enter your email address.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px", "background-color": "#C76D6D", "font-weight": "700", "font-style": "italic", "font-size": "17px"}).fadeIn(1500);
                email.focus();
            }
            else if( email.val().length > 255 || email.val().indexOf('@') == -1 || email.val().indexOf('.') == -1 ) {
                $(".confirm-msg").text("Please enter a valid email address.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px", "background-color": "#C76D6D", "font-weight": "700", "font-style": "italic", "font-size": "17px"}).fadeIn(1500);
                email.focus();
                email.select();
              }
            else if ( message.val() == '' && message.val().length < 40 )  {
                $(".confirm-msg").text("Please enter a message.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px", "background-color": "#C76D6D", "font-weight": "700", "font-style": "italic", "font-size": "17px"}).fadeIn(1500);
                message.focus();
              }
       /*else if ( typeof optradios.val() == 'undefined' )  {
                $(".confirm-msg").text("Please choose a package.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "10px", "margin": "0px 15px 35px 15px", "background-color": "#C76D6D", "font-weight": "700", "font-style": "italic", "font-size": "17px"}).fadeIn(1500);
                optradios.focus();
              }*/
            else  {
               // $.post( "submit_form.php", { name: fullname, email: email, phone: phone, wed_date: wed_date });

        $.ajax({
          method: "POST",
          url: "php/contact.php",
          data: {  name: fullname.val(), email: email.val(), message: message.val(), optradios: optradios.val(), wed_date: wed_date.val(), phone: phone.val(), cer_venue: cer_venue.val(), rec_venue: rec_venue.val(), hearabouts: hearabouts }
        })
          .done(function( msg ) {

                $(".confirm-msg").text("Thanks for contacting us. We will get back to you as soon as we can.").css({"color": "#fff", "height": "50px", "border-radius": "4px", "padding-top": "13px", "margin": "0px 0px 15px 0px", "background-color": "#69A565", "font-weight": "700", "font-style": "italic", "font-size": "17px"}).fadeIn(1500);

          });

            }

            return e.preventDefault();
         });
