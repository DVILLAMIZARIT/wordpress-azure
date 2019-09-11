jQuery(document).ready(function($){'use strict';

/* ---------------------------------------------------------
    Mega menu
------------------------------------------------------------ */ 

        /* Dynamic animation */
        var btAnimation = {};
        btAnimation.slideUp = function( elem, timer ) {

                dynamics.css(
                    elem,
                    { translateX: 20, opacity: 0, scale: .3 }
                )

                dynamics.animate(
                    elem,
                    { translateX: 0, opacity: 1, scale: 1 },
                    {
                        type: dynamics.spring,
                        duration: 656,
                        frequency: 166,
                        friction: 155,
                        delay: timer,
                        complete: function() {
                            $( elem ).css( 'transform', 'none' )
                        }
                    }
                );
            }

        btAnimation.slideDown = function( elem, timer ) {
                dynamics.css(
                    elem,
                    { translateX: 0, opacity: 1 }
                )

                dynamics.animate(
                    elem,
                    { translateX: 20, opacity: 0 },
                    {
                        type: dynamics.spring,
                        duration: 656,
                        frequency: 166,
                        friction: 155,
                        delay: timer,
                        complete: function() {
                            $( elem ).css( 'transform', 'none' )
                        }
                    }
                );
            }


        /* Open the hide menu */
        function bddexOpenMenu() {
            $('#bddex-hamburger').on('click', function() {
                $(this).toggleClass('active');
                $('.bddex-menu-list').toggleClass('active-menu-mb');
                // $('.bddex-menu-list').toggleClass('hidden-xs');
                // $('.bddex-menu-list').toggleClass('hidden-sm');
            });
        }
        bddexOpenMenu();
        
        /* Mobile Menu Dropdown Icon */
        function bddexMobileMenuDropdown() {
            var hasChildren = $('.bddex-menu-list ul li.menu-item-has-children');

            hasChildren.each( function() {
                var $btnToggle = $('<a class="mb-dropdown-icon hidden-lg hidden-md" href="#"></a>');
                $( this ).append($btnToggle);
                $btnToggle.on( 'click', function(e) {
                    e.preventDefault();
                    $( this ).toggleClass('open');
                    $( this ).parent().children('ul').toggle('slow');
                } );
            } );
        }
        bddexMobileMenuDropdown();
/* ---------------------------------------------------------
   Side Menu
------------------------------------------------------------ */             
            $("#side-menu-icon-close").click(function(e){e.preventDefault();
            $("#side-menu-wrapper").toggleClass("active")});
            $("#side-menu-icon").click(function(e){e.preventDefault();
            $("#side-menu-wrapper").toggleClass("active")});
                    
/* ---------------------------------------------------------
   News Ticker
------------------------------------------------------------ */ 
  var bxtrending    = $('.bxtrending').data('bxtrending');
  $('.bxtrending').carousel({
    interval: bxtrending
  })

  /* ---------------------------------------------------------
    News Ticker / Trending
------------------------------------------------------------ */ 
    var $woo = $('.bddex_news_ticker')
    if ($woo.length) {
        $woo.owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            autoplayHoverPause: true,
            autoplayTimeout: 3000,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            smartSpeed: 800,
            autoplay: 3000,
            navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1024:{
                    items:1
                },
                1200:{
                    items:1
                }
            }
        });         
    }

/* ---------------------------------------------------------
   Portfolio Single Page Slider
------------------------------------------------------------ */ 

            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                galleryMargin:10,
                item:1,
                thumbItem:8,
                slideMargin: 100,
                speed:800, // slide speed, you can increase the value to slow down
                pause:3000, // slide time, you can adjust slide time to increase / decrease value
                auto:true,
                loop:true,
                pauseOnHover:true,
                onSliderLoad: function() {
            $('#image-gallery').removeClass('cS-hidden');
                    
                }  
            });

            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
//Portfolio Single Page full width Slider             
            $('#image-gallerys').lightSlider({
                gallery:true,
                galleryMargin:10,
                item:1,
                thumbItem:10,
                slideMargin: 100,
                speed:800, // slide speed, you can increase the value to slow down
                pause:3000, // slide time, you can adjust slide time to increase / decrease value
                auto:true,
                loop:true,
                pauseOnHover:true,
                onSliderLoad: function() {
            $('#image-gallerys').removeClass('cS-hidden');
                    
                }  
            });
/* ---------------------------------------------------------
   LearnPress Course Single Page Slider
------------------------------------------------------------ */ 

            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#course-gallery').lightSlider({
                gallery:true,
                galleryMargin:10,
                item:1,
                thumbItem:8,
                slideMargin: 100,
                speed:800, // slide speed, you can increase the value to slow down
                pause:3000, // slide time, you can adjust slide time to increase / decrease value
                auto:true,
                loop:true,
                pauseOnHover:true,
                onSliderLoad: function() {
            $('#course-gallery').removeClass('cS-hidden');
                    
                }  
            });
/* ---------------------------------------------------------
   related course
------------------------------------------------------------ */ 
$('.related-course').owlCarousel({
    loop:false,
    margin:20,
    autoplay:false,
    slideSpeed: 200,
    paginationSpeed: 300,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    lazyLoad:true,
    nav: true,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'], 
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        768:{
            items:2
        },
        1000:{
            items:3
        },
         1400:{
            items:4
        }
    }
});


/* ---------------------------------------------------------
    Flexslider
------------------------------------------------------------ */ 
$(window).load(function(){
$('.flexslider').flexslider({
    animation: "slide",
    slideshowSpeed: "3000",
    animationSpeed: "600",
    });
});


/* ----------------------------------------------------------- */
/*  Post Block 2
/* ----------------------------------------------------------- */
    if( $('.post-block2-element').length > 0 ){
        var dir = $("html").attr("dir");
        var rtl = false;
        if( dir == 'rtl' ){
        rtl = true;
      }
      var pb2ap    = $('.post-block2-element').data('pb2_en_ap'),
          pb2nav   = $('.post-block2-element').data('pb2_nav');

    $(".post-block2-element").slick({
      rtl: rtl,
      draggable: false,
      rows: 2,
      slidesPerRow: 1,
      slidesToScroll: 1,
      infinite: true,
      dots: false,
      arrows: pb2nav,
      autoplay: pb2ap,
      prevArrow: '<span class="pb-common-prev pb-common-nav"><i class="fa fa-angle-left"></i></span>',
      nextArrow: '<span class="pb-common-next pb-common-nav"><i class="fa fa-angle-right"></i></span>',
    });
  }

  var pb2ap    = $('.post-block2-element').data('pb2_en_ap');
  $('.post-block2-element').carousel({
    interval: pb2ap
  })

/* ----------------------------------------------------------- */
/*  Post Block 4
/* ----------------------------------------------------------- */
    if( $('.post-block4-element').length > 0 ){
      var dir = $("html").attr("dir");
        var rtl = false;
        if( dir == 'rtl' ){
        rtl = true;
      }
      var pb4ap    = $('.post-block4-element').data('pb4_en_ap'),
          pb4nav   = $('.post-block4-element').data('pb4_nav');

    $(".post-block4-element").slick({
      rtl: rtl,
      draggable: false,
      rows: 3,
      slidesPerRow: 1,
      slidesToScroll: 1,
      infinite: true,
      dots: false,
      arrows: pb4nav,
      autoplay: pb4ap,
      prevArrow: '<span class="pb-common-prev pb-common-nav"><i class="fa fa-angle-left"></i></span>',
      nextArrow: '<span class="pb-common-next pb-common-nav"><i class="fa fa-angle-right"></i></span>',
    });
  }

/* ----------------------------------------------------------- */
/*  Post Block 5
/* ----------------------------------------------------------- */
    if( $('.post-block5-element').length > 0 ){
      var dir = $("html").attr("dir");
        var rtl = false;
        if( dir == 'rtl' ){
        rtl = true;
      }
      var pb5ap    = $('.post-block5-element').data('pb5_en_ap'),
          pb5nav   = $('.post-block5-element').data('pb5_nav');

    $(".post-block5-element").slick({
      rtl: rtl,
      draggable: false,
      rows: 2,
      slidesPerRow: 3,
      slidesToScroll: 1,
      infinite: true,
      dots: false,
      arrows: pb5nav,
      autoplay: pb5ap,
      prevArrow: '<span class="pb-common-prev pb-common-nav"><i class="fa fa-angle-left"></i></span>',
      nextArrow: '<span class="pb-common-next pb-common-nav"><i class="fa fa-angle-right"></i></span>',
      responsive:{
                0:{
                    items:2
                },
                600:{
                    items:2
                },
                1024:{
                    items:3
                },
                1200:{
                    items:3
                }
            }
    });
  }

  var ps1enap    = $('.post-slide1-element').data('ps1_en_ap');
  $('.post-slide1-element').carousel({
    interval: ps1enap
  })

/* ---------------------------------------------------------
    Woocommerce Carousel
------------------------------------------------------------ */ 
    var $woo = $('.woo-cars')
    if ($woo.length) {
        $woo.owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            smartSpeed: 500,
            autoplay: 4500,
            navText: [ '<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1024:{
                    items:3
                },
                1200:{
                    items:4
                }
            }
        });         
    }

/* ---------------------------------------------------------
    Portfolio Carousel
------------------------------------------------------------ */ 
    var $project = $('.project-carousel')
    if ($project.length) {
        $project.owlCarousel({
            loop:true,
            margin:20,
            rtl:false,
            nav:true,
            smartSpeed: 500,
            autoplay: 3000,
            navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1024:{
                    items:4
                },
                1200:{
                    items:4
                }
            }
        });         
    }
/* ---------------------------------------------------------
    Testimonials Carousel in service sidebar small
------------------------------------------------------------ */ 
    var $service_testimonial = $('.service_testimonial')
    if ($service_testimonial.length) {
        $service_testimonial.owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            autoplayHoverPause:true,
            autoplay: 5000,
            smartSpeed: 700,
            navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                760:{
                    items:1
                },
                1024:{
                    items:1
                },
                1200:{
                    items:1
                }
            }
        });         
    }



}); // End of jquery    

/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */