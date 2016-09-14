/* =Main INIT Function
-------------------------------------------------------------- */

// detect if IE : from http://stackoverflow.com/a/16657946
				var ie = (function(){
					var undef,rv = -1; // Return value assumes failure.
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf('MSIE ');
					var trident = ua.indexOf('Trident/');

					if (msie > 0) {
						// IE 10 or older => return version number
						rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
					} else if (trident > 0) {
						// IE 11 (or newer) => return version number
						var rvNum = ua.indexOf('rv:');
						rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
					}

					return ((rv > -1) ? rv : undef);
				}());


				// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179
				// left: 37, up: 38, right: 39, down: 40,
				// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
				var keys = [32, 37, 38, 39, 40], wheelIter = 0;

				function preventDefault(e) {
					e = e || window.event;
					if (e.preventDefault)
					e.preventDefault();
					e.returnValue = false;
				}

				function keydown(e) {
					for (var i = keys.length; i--;) {
						if (e.keyCode === keys[i]) {
							preventDefault(e);
							return;
						}
					}
				}

				function touchmove(e) {
					preventDefault(e);
				}

				function wheel(e) {
					// for IE
					//if( ie ) {
						//preventDefault(e);
					//}
				}

				function disable_scroll() {
					window.onmousewheel = document.onmousewheel = wheel;
					document.onkeydown = keydown;
					document.body.ontouchmove = touchmove;
				}

				function enable_scroll() {
					window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;
				}

				var docElem = window.document.documentElement,
					scrollVal,
					isRevealed,
					noscroll,
					isAnimating,
					container = document.getElementById( 'container1' ),
					trigger2 = document.getElementById( 'btn_trigger22' ),
					trigger = document.getElementById( 'btn_trigger' );

				function scrollY() {
					return window.pageYOffset || docElem.scrollTop;
				}

				function scrollPage() {
				//alert('ho ho');
					scrollVal = scrollY();

					if( noscroll && !ie ) {
						if( scrollVal < 0 ) return false;
						// keep it that way
						window.scrollTo( 0, 0 );


					}

					if( classie.has( container, 'notrans' ) ) {
						classie.remove( container, 'notrans' );
						return false;
					}

					if( isAnimating ) {
						return false;
					}

					if( scrollVal <= 0 && isRevealed ) {

						toggle(0);

						$("header.desktop").show('slow');
						$("#sticky_image1").hide();
						$(".nav-content").show('slow');
						$(".sticky-menu").hide();
						$('nav.desktop .nav-content').css({'float' : 'none' ,'margin': '0 auto' , 'width' : 'auto'});
						$('nav.desktop .nav-content li a').css('color','#fff');
						$('nav.desktop.sticky').css({'width':'100%','padding-right':'0%'});




					}
					else if( scrollVal > 0 && !isRevealed ){

						toggle(1);
						$("header.desktop").hide();
						$("#sticky_image1").show();
						$(".nav-content").hide();
						$(".sticky-menu").show();
						$('nav.desktop .nav-content').css({'float' : 'right' , 'width' : 'auto'});
						$('nav.desktop .nav-content li a').css('color','#000');
						$('nav.desktop ').css({'width':'83%' , 'padding-right':'15%'});
						$('nav.desktop .nav-content li').css('padding-right','29px');



					}




				$(window).resize(function(){

					if ( ($(window).width() < 800) && ($(window).width() > 767))

					    {

						$("header.mobile .nav-button").css("margin-top","5px");


						}

						else if ( ($(window).width() < 767) && ($(window).width() >480))
						{

						$(".nav-button").addClass("small-margin");

						}

						else if ( ($(window).width() < 479) && ($(window).width() >240))
						{

						$(".nav-button").css("margin-top","10px");



						}
					});


				}

				function toggle( reveal ) {
					isAnimating = true;

					if( reveal ) {
						classie.add( container, 'modify' );

							//if ( $(window).height() < 510 ) {


								setTimeout(function() {
								/*var scrollTop = $(window).scrollTop();


									//alert(scrollTop);

									if(scrollTop >= 10 && scrollTop <= 90)
								{
										$("html,body").animate({ scrollTop: 15 }, "fast");
										//$("#page_content").css("top", "200%");

								}*/
}, 100);

								if ($(window).height() > 420 &&  $(window).height() < 1510 )

								 {
									$("#page_content").css("top", "0%");

								}

							//}

							//alert($(window).height());


							if ( $(window).width() < 400 ) {
								$("#item").removeClass();
							}

					}
					else {

						classie.remove( container, 'modify' );
					}

					// simulating the end of the transition:
					setTimeout( function() {
						isRevealed = !isRevealed;
						isAnimating = false;
						if( reveal ) {
							noscroll = false;
							enable_scroll();

							var path = window.location.pathname;
							var page = path.split("/").pop();

							if(page != "contact.html"){
								$('nav, header').addClass('sticky');
								$('.sticky-head').show();
								$('nav.desktop.sticky').stop().animate({
									top: 15
								});

								$('header.desktop.sticky').stop().animate({
									top: 5
								});
								$('.logo').height('auto');

								//navigationSticky();
									$(window).resize(function(){

										if  ($(window).width() < 768)

										{
											$('.logo').width('77px');
										}

										if  ($(window).width() > 767)

										{
											$('.logo').width('100px');
										}

									});

							}


						}
					},1200 );
				}


function initializeJS() {

	"use strict";

	//IE9 RECOGNITION

	if (typeof $.browser != "undefined" && typeof $.browser.msie != "undefined" && $.browser.msie && $.browser.version == 9) {

		$('html').addClass('ie9');
	}

	//NAVIGATION DETECT
	(function() {
	    function navDetect(){

			var windowWidth = $(window).width();

			if ( windowWidth > 767 ) {
				$('nav, header').removeClass('mobile');
				$('nav, header').addClass('desktop');
			} else {
				$('nav, header').removeClass('desktop');
				$('nav, header').addClass('mobile');
			}

			if(( windowWidth > 767 ) && ( windowWidth < 1180 ))
			{
				$("header.desktop").addClass('position_logo');
			}
			else
			{
				$("header.desktop").removeClass('position_logo');
			}




	    }

	    $(window).on("resize", navDetect);
	    $(document).on("ready", navDetect);
	})();

	//NAVIGATION CUSTOM FUNCTION
	(function() {
		function navigationInit(){

			//MOBILE BUTTON
		/*	$('.nav-button').click(function() {
				if($('nav').is(":visible")) {
					$('nav').slideUp(100);
					$('.nav-button').removeClass('open');
				}
				else {
					$('nav').slideDown(100);
					$('.nav-button').addClass('open');
				}
			});*/

			(function() {
				function navigationSticky(){
					$(".desktop").css("width", "100%");

					var scrollTop = $(window).scrollTop();
					//console.log(scrollTop);
					if (scrollTop > 1) {
						$('nav, header').addClass('sticky');
						$('.sticky-head').show();


						//$('header.desktop.sticky, nav.desktop.sticky').stop().animate({
						//	top: 15
						//});

						$('nav.desktop.sticky').stop().animate({
							top: 15
						});

						$('header.desktop.sticky').stop().animate({
							top: 5
						});
						$('.logo').height('auto');




						$('.cl-effect-3 a:after').addClass( "magic_bg" );

							$(window).resize(function(){

										if  ($(window).width() < 768)

										{
											$('.logo').width('77px');
										}

										if  ($(window).width() > 767)

										{
											$('.logo').width('100px');
										}

									});


					} else {
						if(scrollTop < 1){
							$('nav.desktop.sticky').stop().animate({
							top: 1,},
								1, function() {
									$('nav, header').removeClass('sticky');
									$('.sticky-head').hide();


								});

							$('.cl-effect-3 a:after').removeClass( "magic_bg" );
							$('header.desktop.sticky').stop().animate({
							top: 78
							});
							$('header.desktop.sticky').css('margin-top','6.1%');

						}

					if	($(window).width() > 361)

						{
							$('.logo').css('width','129px');
						}

						else
						{
							$('.logo').css('width','77px');
						}
					}

				}

				$(window).on("scroll", navigationSticky);
				$(window).on("resize", navigationSticky);


				var path = window.location.pathname;
				var page = path.split("/").pop();

				if(page != "contact.html"){
						if(window.location.hash) {

				} else {

				}



				window.addEventListener( 'scroll', scrollPage );
				/*trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
				trigger2.addEventListener( 'click', function() { toggle( 'reveal' ); } );*/
			}

			})();
		}

		$(document).on("ready", navigationInit);
	})();


if (window.matchMedia('only screen and (min-width: 768px)').matches) {

	//HERO DIMENSTION AND CENTER
	(function() {
	    function heroInit(){
		//	alert("init");
	    	var hero = $('.hero'),
				ww = $(window).width(),
				wh = $(window).height(),
				heroHeight = wh;

			hero.css({
				height: heroHeight+"px",
			});

			var heroContent = $('.hero-content'),
				contentHeight = heroContent.height(),
				parentHeight = $('.hero').height(),
				parentHeightSmall = $('.hero-small').height(),
				topMargin = (parentHeight - contentHeight) / 2,
				heroContentSmall = $('.hero-small-content'),
				contentSmallHeight = heroContentSmall.height(),
				topMagrinSmall = (parentHeightSmall - contentSmallHeight) / 2;

				heroContent.css({
				"margin-top" : topMargin+"px"
			});


				if ( $(window).width() > 768 ) {
				heroContent.css({
				"height" : "0px"
				});
			}


			if ( $(window).width() < 300 ) {
				heroContent.css({
				"margin-top" : "60px"
				});
			}

			if ( $(window).width() > 767 ) {

				heroContentSmall.css({
					"margin-top" : topMagrinSmall+ 75 + "px"
				});

			}

			else {

				heroContentSmall.css({
					"margin-top" : topMagrinSmall + 35 +  "px"
				});
			}

	    }

	    $(window).on("resize", heroInit);
	    $(document).on("ready", heroInit);
	})();

	//LANDING PAGE VIDEO
	$(function() {

		//alert("hola");
	    var videobackground = new $.backgroundVideo($('#bgVideo'), {
	        "align" : "centerXY",
	        "path" : "video/",
	        "width": 640,
	        "height": 360,
	        "filename" : "intro_video",
	        "types" : ["mp4", "ogv", "webm"]
	    });

	});

	$(function() {


	    var videobackground = new $.backgroundVideo($('#bgVideo-main'), {
	        "align" : "centerXY",
	        "path" : "video/",
	        "width": 640,
	        "height": 360,
	        "filename" : "intro_video",
	        "types" : ["mp4", "ogv", "webm"]
	    });

	});

}

	//FEATURE BOX
	$('.feature.left').hover(function() {
		$('.feature-box').addClass("dual-left");
	}, function() {
		$('.feature-box').removeClass("dual-left");
	});

	$('.feature.right').hover(function() {
		$('.feature-box').addClass("dual-right");
	}, function() {
		$('.feature-box').removeClass("dual-right");
	});

	//TEAM
	/*$('.more-info').click(function() {
		if($(this).prev().is(':hidden')) {
			$(this).addClass('active').prev().animate({ height: 'toggle', opacity: 'toggle' }, 1000);
		} else {
			$(this).removeClass('active').prev().animate({ height: 'toggle', opacity: 'toggle' }, 1000);
		}
	});*/

	//LOCAL SCROLL
	/*$('.nav-content, .call-to-action').localScroll();*/

	$("#top").click(function () {
		return $("body,html").stop().animate({
			scrollTop: 0
		}, 800), !1;
	});

	//ANIMATIONS
	$('.animated').appear();

	$(document.body).on('appear', '.fade', function() {
		$(this).each(function(){ $(this).addClass('ae-animation-fade') });
	});
	$(document.body).on('appear', '.slide', function() {
		$(this).each(function(){ $(this).addClass('ae-animation-slide') });
	});
	$(document.body).on('appear', '.hatch', function() {
		$(this).each(function(){ $(this).addClass('ae-animation-hatch') });
	});
	$(document.body).on('appear', '.entrance', function() {
		$(this).each(function(){ $(this).addClass('ae-animation-entrance') });
	});

	//CONTACT-FORM
	$('#contact-open').click(function (e) {
		e.preventDefault();
		if ( $('#contact-form').is(':hidden') ) {
			$('#contact-form').slideDown();
			 $('html, body').delay(200).animate({
			      scrollTop: $('#contact-form').offset().top
			  }, 1000);
		} else {
			$('#contact-form').slideUp();
		}
	});

	$('#contactform').submit(function(){

		var action = $(this).attr('action');

		$("#alert").slideUp(750,function() {
			$('#alert').hide();

 		$('#submit')
			.after('<img src="images/ajax-loader.gif" class="loader" />')
			.attr('disabled','disabled');

		$.post(action, {
			name: $('#name').val(),
			email: $('#email').val(),
			message: $('#message').val()
		},
			function(data){
				document.getElementById('alert').innerHTML = data;
				$('#alert').slideDown('slow');
				$('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit').removeAttr('disabled');
				if(data.match('success') != null) {
					$('#name').val('');
					$('#email').val('');
					$('#message').val('');
				}
			}
		);

		});

		return false;

	});

	jQuery('.timer').appear();
	jQuery(document.body).on('appear', '.timer', function() {
		jQuery(this).countTo();
	});

	jQuery(document.body).on('disappear', '.timer', function() {
		jQuery(this).removeClass('timer');
	});

};

/* END ------------------------------------------------------- */

/* =Document Ready Trigger
-------------------------------------------------------------- */
$(document).ready(function(){

	initializeJS();

});
