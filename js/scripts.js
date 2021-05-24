(function ($) {
  $(document).ready(function () {
    "use strict";
	  
	  
	  // HAMBURGER
		$(function(){
			var $burger = $('.burger');
			var $bars = $('.burger-svg__bars');
			var $bar = $('.burger-svg__bar');
			var $bar1 = $('.burger-svg__bar-1');
			var $bar2 = $('.burger-svg__bar-2');
			var $bar3 = $('.burger-svg__bar-3');
			var isChangingState = false;
			var isOpen = false;
			var burgerTL = new TimelineMax();

			function burgerOver() {

				if(!isChangingState) {
					burgerTL.clear();
					if(!isOpen) {
						burgerTL.to($bar1, 0.5, { y: -2, ease: Elastic.easeOut })
								.to($bar2, 0.5, { scaleX: 0.6, ease: Elastic.easeOut, transformOrigin: "50% 50%" }, "-=0.5")
								.to($bar3, 0.5, { y: 2, ease: Elastic.easeOut }, "-=0.5");
					}
					else {
						burgerTL.to($bar1, 0.5, { scaleX: 1.2, ease: Elastic.easeOut })
								.to($bar3, 0.5, { scaleX: 1.2, ease: Elastic.easeOut }, "-=0.5");
					}
				}
			}

			function burgerOut() {
				if(!isChangingState) {
					burgerTL.clear();
					if(!isOpen) {
						burgerTL.to($bar1, 0.5, { y: 0, ease: Elastic.easeOut })
								.to($bar2, 0.5, { scaleX: 1, ease: Elastic.easeOut, transformOrigin: "50% 50%" }, "-=0.5")
								.to($bar3, 0.5, { y: 0, ease: Elastic.easeOut }, "-=0.5");
					}
					else {
						burgerTL.to($bar1, 0.5, { scaleX: 1, ease: Elastic.easeOut })
								.to($bar3, 0.5, { scaleX: 1, ease: Elastic.easeOut }, "-=0.5");
					}
				}
			}

			function showCloseBurger() {
				burgerTL.clear();
				burgerTL.to($bar1, 0.3, { y: 6, ease: Power4.easeIn })
						.to($bar2, 0.3, { scaleX: 1, ease: Power4.easeIn }, "-=0.3")
						.to($bar3, 0.3, { y: -6, ease: Power4.easeIn }, "-=0.3")
						.to($bar1, 0.5, { rotation: 45, ease: Elastic.easeOut, transformOrigin: "50% 50%" })
						.set($bar2, { opacity: 0, immediateRender: false }, "-=0.5")
						.to($bar3, 0.5, { rotation: -45, ease: Elastic.easeOut, transformOrigin: "50% 50%", onComplete: function() { isChangingState = false; isOpen = true; } }, "-=0.5");
			}

			function showOpenBurger() {
				burgerTL.clear();
				burgerTL.to($bar1, 0.3, { scaleX: 0, ease: Back.easeIn })
						.to($bar3, 0.3, { scaleX: 0, ease: Back.easeIn }, "-=0.3")
						.set($bar1, { rotation: 0, y: 0 })
						.set($bar2, { scaleX: 0, opacity: 1 })
						.set($bar3, { rotation: 0, y: 0 })
						.to($bar2, 0.5, { scaleX: 1, ease: Elastic.easeOut })
						.to($bar1, 0.5, { scaleX: 1, ease: Elastic.easeOut }, "-=0.4")
						.to($bar3, 0.5, { scaleX: 1, ease: Elastic.easeOut, onComplete: function() { isChangingState = false; isOpen = false; } }, "-=0.5");
			}

			$burger.on('click', function(e) {
				$("body").toggleClass("overflow");
				$(".navigation-menu").toggleClass("active");
				$(".navbar").toggleClass("light");
				if(!isChangingState) {
					isChangingState = true;

					if(!isOpen) {
						showCloseBurger();
					}
					else {
						showOpenBurger();
					}	
				}

			});

			$burger.hover( burgerOver, burgerOut );

		});
	  
	  
	  
	  // HAMBURGER AUDIO
			document.getElementById("hamburger-menu").addEventListener('click', function(e) {
			document.getElementById("hamburger-hover").play();
	  	});
	  
	  

    // MOBILE MENU
    if ($(window).width() < 980) {

      $('.menu-horizontal li.dropdown i').on('click', function (e) {
        $(this).parent().children('.menu-horizontal li ul').toggle();
        return true;
      });

    }


   


    // SANDWICH MENU
    $('.menu-container li.dropdown i').on('click', function (e) {
      $(this).parent().children('.menu-container li ul').toggle();
      return true;
    });


    // CONTENT SLIDER
    var swiper = new Swiper('.content-slider', {
      slidesPerView: 'auto',
      centeredSlides: true,
      spaceBetween: 80,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    });


    // SWIPER SLIDER
			var mySwiper = new Swiper ('.swiper-container', {
			slidesPerView: 'auto',
      		spaceBetween: 0,
			loop: true,
			autoplay: {
				delay: 6000,
				disableOnInteraction: false,
			  },
			pagination: {
				el: '.swiper-pagination',
					clickable: true,
				renderBullet: function (index, className) {
				  return '<span class="' + className + '"><svg><circle r="18" cx="20" cy="20"></circle></svg></span>';
				},
			},
			navigation: {
			  nextEl: '.swiper-button-next',
			  prevEl: '.swiper-button-prev',
			},
		  })


    // SCROLL DOWN
    $(".bottom-bar .scroll-down a").on('click', function (e) {
      $('html, body').animate({
        scrollTop: $("section").offset().top
      }, 500);
    });
	  
	  
	  
	 // GO TO TOP
			$(window).scroll(function () {
				if ($(this).scrollTop() > 300) {
					$('.gotop').fadeIn();
				} else {
					$('.gotop').fadeOut();
				}
			});

			$('.gotop').on('click', function(e) {
				$("html, body").animate({
					scrollTop: 0
				}, 600);
				return false;
			});
	  
	  
	  
	  // STICKY SIDE LOGO
		$(window).on("scroll touchmove", function () {
		$('.logo').toggleClass('sticky', $(document).scrollTop() > 300);
		});
		
		
		
		
		// HIDE NAVBAR
		$(window).on("scroll touchmove", function () {
		$('.navbar').toggleClass('hide', $(document).scrollTop() > 30);
		});
	  
	  
	  
	  
	  


    // PARALLAX
    $.stellar({
      horizontalScrolling: false,
      verticalOffset: 0,
      responsive: true
    });


    // PAGE TRANSITION
    $('body a').on('click', function (e) {
      if ($('body').hasClass('no-preloader')) {

      } else {
        var target = $(this).attr('target');
        var fancybox = $(this).data('fancybox');
        var url = this.getAttribute("href");
        if (target != '_blank' && typeof fancybox == 'undefined' && url.indexOf('#') < 0) {


          e.preventDefault();
          var url = this.getAttribute("href");
          if (url.indexOf('#') != -1) {
            var hash = url.substring(url.indexOf('#'));


            if ($('body ' + hash).length != 0) {
              $('.transition-overlay').removeClass("active");


            }
          } else {
            $('.transition-overlay').toggleClass("active");
            setTimeout(function () {
              window.location = url;
            }, 1300);

          }
        }
      }
    });



    // SANDWICH MENU
    $('.sandwich').on('click', function (e) {
      if ($("body").hasClass("display-nav")) {
        $(".sandwich .sand span:nth-child(1)").css("transition-delay", "0.6s");
        $(".sandwich .sand span:nth-child(2)").css("transition-delay", "0.75s");
        $(".page-header .container").css("transition-delay", "0.8s");
        $(".video-bg .container").css("transition-delay", "0.8s");
        $(".slider .slide-content").css("transition-delay", "0.8s");
        $(".kinetic-slider ").css("transition-delay", "0.8s");

        window.setTimeout(function () {
          $(".sandwich .sand span:nth-child(1)").css("transition-delay", "0s");
          $(".sandwich .sand span:nth-child(2)").css("transition-delay", "0s");
        }, 1000);

      } else {

        $(".sandwich .sand span:nth-child(1)").css("transition-delay", "0s");
        $(".sandwich .sand span:nth-child(2)").css("transition-delay", "0.15s");
        $(".page-header .container").css("transition-delay", "0s");
        $(".video-bg .container").css("transition-delay", "0s");
        $(".slider .slide-content").css("transition-delay", "0s");
        $(".kinetic-slider").css("transition-delay", "0s");

      }
      $("body").toggleClass("display-nav");
    });


    // DATA BACKGROUND IMAGE
    var pageSection = $("*");
    pageSection.each(function (indx) {
      if ($(this).attr("data-background")) {
        $(this).css("background-image", "url(" + $(this).data("background") + ")");
      }
    });


    /* MAGNET CURSOR*/
    var cerchio = document.querySelectorAll('.magnet-link');
    cerchio.forEach(function (elem) {
      $(document).on('mousemove touch', function (e) {
        magnetize(elem, e);
      });
    })

    function magnetize(el, e) {
      var mX = e.pageX,
        mY = e.pageY;
      const item = $(el);

      const customDist = item.data('dist') * 20 || 80;
      const centerX = item.offset().left + (item.width() / 2);
      const centerY = item.offset().top + (item.height() / 2);

      var deltaX = Math.floor((centerX - mX)) * -0.35;
      var deltaY = Math.floor((centerY - mY)) * -0.35;

      var distance = calculateDistance(item, mX, mY);

      if (distance < customDist) {
        TweenMax.to(item, 0.5, {
          y: deltaY,
          x: deltaX,
          scale: 1
        });
        item.addClass('magnet');
      } else {
        TweenMax.to(item, 0.6, {
          y: 0,
          x: 0,
          scale: 1
        });
        item.removeClass('magnet');
      }
    }

    function calculateDistance(elem, mouseX, mouseY) {
      return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offset().left + (elem.width() / 2)), 2) + Math.pow(mouseY - (elem.offset().top + (elem.height() / 2)), 2)));
    }

    function lerp(a, b, n) {
      return (1 - n) * a + n * b
    }

    // Inizio Cursor
    class Cursor {
      constructor() {
        this.bind()
        //seleziono la classe del cursore
        this.cursor = document.querySelector('.js-cursor')

        this.mouseCurrent = {
          x: 0,
          y: 0
        }

        this.mouseLast = {
          x: this.mouseCurrent.x,
          y: this.mouseCurrent.y
        }

        this.rAF = undefined
      }

      bind() {
        ['getMousePosition', 'run'].forEach((fn) => this[fn] = this[fn].bind(this))
      }

      getMousePosition(e) {
        this.mouseCurrent = {
          x: e.clientX,
          y: e.clientY
        }
      }

      run() {
        this.mouseLast.x = lerp(this.mouseLast.x, this.mouseCurrent.x, 0.2)
        this.mouseLast.y = lerp(this.mouseLast.y, this.mouseCurrent.y, 0.2)

        this.mouseLast.x = Math.floor(this.mouseLast.x * 100) / 100
        this.mouseLast.y = Math.floor(this.mouseLast.y * 100) / 100

        this.cursor.style.transform = `translate3d(${this.mouseLast.x}px, ${this.mouseLast.y}px, 0)`

        this.rAF = requestAnimationFrame(this.run)
      }

      requestAnimationFrame() {
        this.rAF = requestAnimationFrame(this.run)
      }

      addEvents() {
        window.addEventListener('mousemove', this.getMousePosition, false)
      }

      on() {
        this.addEvents()

        this.requestAnimationFrame()
      }

      init() {
        this.on()
      }
    }

    if ($('.js-cursor').length > 0) {
      const cursor = new Cursor()

      cursor.init();


      $('a, .sandwich, .equalizer, .swiper-pagination-bullet, .swiper-button-prev, .swiper-button-next, .main-nav').hover(function () {
        $('.cursor').toggleClass('light');
      });

    }


  });
  // END JQUERY	


  // MASONRY
  function masonry_init() {
    $('.works').masonry({
      itemSelector: '.works li',
      columnWidth: '.works li',
      percentPosition: true
    });
  }

  window.onload = masonry_init;
	
	
	
	
	
	// WOW ANIMATION 
			wow = new WOW(
			{
				animateClass: 'animated',
				offset:       50
			}
			);
			wow.init();
	
	
	


  // EQUALIZER TOGGLE
  if (data.enable_sound_bar == true) {
    var source = data.audio_source;
    var audio = new Audio(); // use the constructor in JavaScript, just easier that way
    audio.addEventListener("load", function () {
      audio.play();
    }, true);
    audio.src = source;
    audio.autoplay = false;
    audio.loop = true;
    audio.volume = 0.2;

    $('.sound').click();
    var playing = false;
    $('.sound').on('click', function (e) {
      if (playing == false) {
        audio.play();
        playing = true;

      } else {
        audio.pause();
        playing = false;
      }
    });
  }


  // EQUALIZER
  function randomBetween(range) {
    var min = range[0],
      max = range[1];
    if (min < 0) {
      return min + Math.random() * (Math.abs(min) + max);
    } else {
      return min + Math.random() * max;
    }
  }

  $.fn.equalizerAnimation = function (speed, barsHeight) {
    var $equalizer = $(this);
    setInterval(function () {
      $equalizer.find('span').each(function (i) {
        $(this).css({
          height: randomBetween(barsHeight[i]) + 'px'
        });
      });
    }, speed);
    $('.sound').on('click', function (e) {
	$('.equalizer').toggleClass('started');
    });
  }

  var barsHeight = [
    [2, 10],
    [5, 14],
    [11, 8],
    [4, 18],
    [8, 3]
  ];
  $('.equalizer').equalizerAnimation(180, barsHeight);

  // COUNTER
  $(document).scroll(function () {
    $('.odometer').each(function () {
      var parent_section_postion = $(this).closest('section').position();
      var parent_section_top = parent_section_postion.top;
      if ($(document).scrollTop() > parent_section_top - 300) {
        if ($(this).data('status') == 'yes') {
          $(this).html($(this).data('count'));
          $(this).data('status', 'no')
        }
      }
    });
  });
	
	
	
	
	// SCROLL BG COLOR
		$(window).scroll(function() {
		  var $window = $(window),
			  $body = $('body'),
			  $panel = $('section, footer, header');

		  var scroll = $window.scrollTop() + ($window.height() / 3);

		  $panel.each(function () {
			var $this = $(this);
			if ($this.position().top <= scroll && $this.position().top + $this.height() > scroll) {

			  $body.removeClass(function (index, css) {
				return (css.match (/(^|\s)color-\S+/g) || []).join(' ');
			  });

			  $body.addClass('color-' + $(this).data('color'));
			}
		  });    

		}).scroll();
	
	
	

// PRELOADER
    var width = 100,
        perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
        EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
        time = parseInt((EstimatedTime / 1000) % 60, 10) * 100;

    var PercentageID = $("#percentage"),
        start = 0,
        end = 100,
        durataion = time;
    animateValue(PercentageID, start, end, durataion);

    function animateValue(id, start, end, duration) {

        var range = end - start,
            current = start,
            increment = end > start ? 1 : -1,
            stepTime = Math.abs(Math.floor(duration / range)),
            obj = $(id);

        var timer = setInterval(function() {
            current += increment;
            $(obj).text(current);
            //obj.innerHTML = current;
            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }

    setInterval(function() {
        $("body").addClass("page-loaded");
    }, time);
	
	
	
	

})(jQuery);
