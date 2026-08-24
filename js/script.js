$(window).on("load", function () {

    "use strict";

    //Clear URL On Page Refresh
    var loc = window.location.href,
        index = loc.indexOf('#');

    if (index > 0) {
        window.location = loc.substring(0, index);
    }

    /* ===================================
        Page Piling
    ====================================== */
    if($(window).width() < 1280) {
        $('html, body').css('overflow-y', 'scroll');
        //Team Counter
        $('.count').each(function () {
            $(this).appear(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
        //Portfolio Counter
        $('.portfolio-counter').each(function () {
            $(this).appear(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });

        // Mobile & Tablet Scroll-Triggered Animation Observer (< 1280px)
        if ('IntersectionObserver' in window) {
            var sectionAnimObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var targetId = entry.target.id;
                        
                        if (targetId === 'home') {
                            $('#home .section1left').addClass('animated slideInLeft');
                            $('#home .section1right').addClass('animated slideInRight');
                        } else if (targetId === 'about') {
                            $('#about .about-fadeIn').addClass('animated slideInLeft');
                            $('#about .about-zoom1In').addClass('animated zoomIn');
                            $('#about .about-zoom2In').addClass('animated zoomIn');
                            $('#about .about-zoom3In').addClass('animated zoomIn');
                            $('#about .about-zoom4In').addClass('animated zoomIn');
                            $('#about .about-zoom5In').addClass('animated fadeInUp');
                        } else if (targetId === 'projects') {
                            $('#projects .section3left').addClass('animated slideInLeft');
                            $('#projects .section3right').addClass('animated slideInRight');
                            $('#projects .team-fade').addClass('animated zoomIn');
                        } else if (targetId === 'tool-management') {
                            $('#tool-management .section5left').addClass('animated slideInLeft');
                            $('#tool-management .section5right').addClass('animated slideInRight');
                            $('#tool-management .blog-left').addClass('animated slideInLeft');
                            $('#tool-management .blog-center').addClass('animated fadeIn');
                            $('#tool-management .blog-right').addClass('animated slideInRight');
                        } else if (targetId === 'careers') {
                            $('#careers .careers-heading-wrap').addClass('animated fadeInUp');
                            $('#careers .careers-role-item').addClass('animated zoomIn');
                        } else if (targetId === 'apply') {
                            $('#apply .apply-heading-wrap').addClass('animated fadeInUp');
                            $('#apply .apply-position-card').addClass('animated zoomIn');
                        } else if (targetId === 'contact') {
                            $('#contact .section6left').addClass('animated slideInLeft');
                            $('#contact .section6right').addClass('animated slideInRight');
                        }

                        // Trigger animation once per section on first entry
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -30px 0px'
            });

            var sectionsToObserve = ['home', 'about', 'projects', 'tool-management', 'careers', 'apply', 'contact'];
            sectionsToObserve.forEach(function (id) {
                var el = document.getElementById(id);
                if (el) {
                    sectionAnimObserver.observe(el);
                }
            });
        }
    }
    else{
        $('#pagepiling').pagepiling({
            direction: 'vertical',
            sectionsColor: ['#171717', '#171717', '#171717', '#171717', '#171717', '#171717', '#171717'],
            anchors: ['home', 'about', 'projects', 'tool-management', 'careers', 'apply', 'contact'],
            scrollingSpeed: 500,
            menu: '#menu',
            easing: 'linear',
            loopBottom: false,
            loopTop: false,
            css3: true,
            navigation: {
                'bulletsColor': '#535353',
                'position': 'left',
                'tooltips': ['home', 'about', 'projects', 'tool-management', 'careers', 'apply', 'contact'],
            },

            //events
            onLeave: function (index, nextIndex, direction) {
                //reaching our First section? The one with our normal site?

                $('.navbar-top-default').fadeOut();
                $('.slider-bottom .slider-social').fadeOut();
                $('.slider-copyright').fadeOut();

                if(nextIndex == 1 || nextIndex == 2 || nextIndex == 3 || nextIndex == 4 || nextIndex == 5 || nextIndex == 6 || nextIndex == 7 || nextIndex == 8 || nextIndex == 9 || nextIndex == 10){

                    setTimeout(function(){
                        $('.navbar-top-default').fadeIn();
                        $('.slider-bottom .slider-social').fadeIn();
                        $('.slider-copyright').fadeIn();
                    }, 600);
                }

                //Team Counter
                if(nextIndex == 3) {
                    $('.count').each(function () {
                        $(this).appear(function () {
                            $(this).prop('Counter', 0).animate({
                                Counter: $(this).text()
                            }, {
                                duration: 3000,
                                easing: 'swing',
                                step: function (now) {
                                    $(this).text(Math.ceil(now));
                                }
                            });
                        });
                    });
                }
                //Portfolio Counter
                if(nextIndex == 4) {
                    $('.portfolio-counter').each(function () {
                        $(this).appear(function () {
                            $(this).prop('Counter', 0).animate({
                                Counter: $(this).text()
                            }, {
                                duration: 3000,
                                easing: 'swing',
                                step: function (now) {
                                    $(this).text(Math.ceil(now));
                                }
                            });
                        });
                    });
                }

                if(nextIndex == 1) {
                    $('.section1left').addClass('slideInLeft');
                    setTimeout(function(){
                        $('.section1left').removeClass('slideInLeft');
                    }, 1800);

                    $('.section1right').addClass('slideInRight');
                    setTimeout(function(){
                        $('.section1right').removeClass('slideInRight');
                    }, 1800);
                }

                if(nextIndex == 2) {
                    $('.about-fadeIn').addClass('slideInLeft');
                    setTimeout(function(){
                        $('.about-fadeIn').removeClass('slideInLeft');
                    }, 1500);

                    $('.about-zoom1In').addClass('zoomIn');
                    setTimeout(function(){
                        $('.about-zoom1In').removeClass('zoomIn');
                    }, 1000);

                    $('.about-zoom2In').addClass('zoomIn');
                    setTimeout(function(){
                        $('.about-zoom2In').removeClass('zoomIn');
                    }, 1200);

                    $('.about-zoom3In').addClass('zoomIn');
                    setTimeout(function(){
                        $('.about-zoom3In').removeClass('zoomIn');
                    }, 1400);

                    $('.about-zoom4In').addClass('zoomIn');
                    setTimeout(function(){
                        $('.about-zoom4In').removeClass('zoomIn');
                    }, 1600);

                    $('.about-zoom5In').addClass('fadeInUp');
                    setTimeout(function(){
                        $('.about-zoom5In').removeClass('fadeInUp');
                    }, 1400);
                }

                if(nextIndex == 3) {
                    $('.section3left').addClass('slideInLeft');
                    setTimeout(function(){
                        $('.section3left').removeClass('slideInLeft');
                    }, 1800);

                    $('.section3right').addClass('slideInRight');
                    setTimeout(function(){
                        $('.section3right').removeClass('slideInRight');
                    }, 1800);

                    $('.team-fade').addClass('zoomIn');
                    setTimeout(function(){
                        $('.team-fade').removeClass('zoomIn');
                    }, 1600);
                }

                if(nextIndex == 4) {
                    $('.section4left').addClass('slideInLeft');
                    setTimeout(function(){
                        $('.section4left').removeClass('slideInLeft');
                    }, 1800);

                    $('.section4right').addClass('slideInRight');
                    setTimeout(function(){
                        $('.section4right').removeClass('slideInRight');
                    }, 1800);

                    $('.portfolio-fade').addClass('zoomIn');
                    setTimeout(function(){
                        $('.portfolio-fade').removeClass('zoomIn');
                    }, 1600);
                }

                if(nextIndex == 4) {
                    $('.section5left').addClass('slideInLeft');
                    setTimeout(function(){
                        $('.section5left').removeClass('slideInLeft');
                    }, 1800);

                    $('.section5right').addClass('slideInRight');
                    setTimeout(function(){
                        $('.section5right').removeClass('slideInRight');
                    }, 1800);

                    $('.blog-left').addClass('slideInLeft');
                    setTimeout(function(){
                        $('.blog-left').removeClass('slideInLeft');
                    }, 1500);

                    $('.blog-right').addClass('slideInRight');
                    setTimeout(function(){
                        $('.blog-right').removeClass('slideInRight');
                    }, 1500);

                    $('.blog-center').addClass('fadeIn');
                    setTimeout(function(){
                        $('.blog-center').removeClass('fadeIn');
                    }, 1500);
                }

                if(nextIndex == 5) {
                    $('.careers-heading-wrap').addClass('fadeInUp');
                    setTimeout(function(){
                        $('.careers-heading-wrap').removeClass('fadeInUp');
                    }, 1000);
                    $('.careers-role-item').addClass('zoomIn');
                    setTimeout(function(){
                        $('.careers-role-item').removeClass('zoomIn');
                    }, 1200);
                }

                if(nextIndex == 6) {
                    $('.apply-heading-wrap').addClass('fadeInUp');
                    setTimeout(function(){
                        $('.apply-heading-wrap').removeClass('fadeInUp');
                    }, 1000);
                    $('.apply-position-card').addClass('zoomIn');
                    setTimeout(function(){
                        $('.apply-position-card').removeClass('zoomIn');
                    }, 1200);
                }

                if(nextIndex == 7) {
                    $('.section6left').addClass('slideInLeft');
                    setTimeout(function(){
                        $('.section6left').removeClass('slideInLeft');
                    }, 1800);

                    $('.section6right').addClass('slideInRight');
                    setTimeout(function(){
                        $('.section6right').removeClass('slideInRight');
                    }, 1800);
                }
            },
        });

        // Prevent inner scroll from triggering pagepiling slide change
        $('.careers-inner, .apply-inner').on('wheel', function(e) {
            var el = this;
            var scrollTop = el.scrollTop;
            var scrollHeight = el.scrollHeight;
            var height = el.clientHeight;
            var delta = e.originalEvent.deltaY;
            var atTop = scrollTop === 0;
            var atBottom = scrollTop + height >= scrollHeight - 1;
            if ((delta < 0 && !atTop) || (delta > 0 && !atBottom)) {
                e.stopPropagation();
            }
        });
    }

    // Apply position card click → fill form field (active on mobile, tablet & desktop)
    $(document).on('click', '.apply-select-btn', function() {
        var pos = $(this).closest('.apply-position-card').data('position');
        $('#apply-position').val(pos);
        $('#apply-position-display').val(pos);
        $('.apply-position-card').removeClass('apply-card-active');
        $(this).closest('.apply-position-card').addClass('apply-card-active');
    });

    // Show chosen filename in apply form
    $(document).on('change', '#apply-form input[type="file"]', function() {
        var name = this.files[0] ? this.files[0].name : 'No file chosen';
        $(this).siblings('.careers-file-name').text(name);
    });

    // Prevent map iframe from trapping scroll — unlock only on click, re-lock on mouse leave
    $('.map-overlay').on('click', function () {
        $(this).hide();
    });
    $('.map-container').on('mouseleave', function () {
        $(this).find('.map-overlay').show();
    });

/* ===================================
        WOW Animation
====================================== */

    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 50,
        mobile: true,
        live: true
    });
    wow.init();

/* ===================================
    Loading Timeout
 ====================================== */
    $('.side-menu').removeClass('hidden');

    setTimeout(function(){
        $("#loader-fade").fadeOut("slow");
    }, 1000);
});

jQuery(function ($) {

    "use strict";

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 260) { // Set position from top to add class
            $('header').addClass('header-appear');
        }
        else {
            $('header').removeClass('header-appear');
        }
    });

    //scroll to appear
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 500)
            $('.scroll-top-arrow').fadeIn('slow');
        else
            $('.scroll-top-arrow').fadeOut('slow');
    });

    //Click event to scroll to top
    $(document).on('click', '.scroll-top-arrow', function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
});




















/* ===================================
     Side Menu Open & Close
====================================== */
function  my_click() {

    $('#my_tog').on("click", function () {
        $(".side_nav").addClass("expand_nav");
        $("#my_tog").addClass("close_nav");
        $("#my_tog").attr("id","close_nav");

        $(".overlay-body").addClass("show_body_overlay");
        $('#pp-nav').hide();
    });

    $('#close_nav').on("click", function () {
        $("#close_nav").removeClass("close_nav");
        $(".side_nav").removeClass("expand_nav");
        $("#my_tog").removeClass("close_nav");
        $("#close_nav").attr("id","my_tog");

        $(".overlay-body").removeClass("show_body_overlay");
        $('#pp-nav').show();
    });
}

$('.side-nav-menu .nav-menu li a').on("click", function () {
    $(".side_nav").removeClass("expand_nav");
    $("#close_nav").removeClass("close_nav");
    $(".side_nav").removeClass("expand_nav");
    $("#my_tog").removeClass("close_nav");
    $("#close_nav").attr("id","my_tog");
    $('#pp-nav').show();
    $('.side-nav-menu .nav-menu .nav-item .nav-link').removeClass('active');
    $(this).addClass('active');
});

/* ===================================
    Broad Nav
====================================== */

$('.my_nav_tog').click(function() {
    $('.broad').addClass('broad-nav');
    $('.broad').css({ opacity: "1" });
    $('.head-nav').hide();
    $('body').addClass('show-modal');
});

$('.btn-close').click(function() {
    $('.broad').css({ opacity: "0" });
    $('body').removeClass('show-modal');
    setTimeout(function() {$('.broad').removeClass('broad-nav')},100);
});

$('.broad ul li a').click(function () {
    $('.broad').css({ opacity: "0" });
    $('body').removeClass('show-modal');
    setTimeout(function() {$('.broad').removeClass('broad-nav')},100);
});

/* ===================================
    Fixed Broad Nav-Bar
 ====================================== */

$(window).on('scroll', function () {
    if($(window).width() < 1280){
        if ($(this).scrollTop() > 100) {
            $('#site-header').addClass('header-scrolled');
        }
        else {
            $('#site-header').removeClass('header-scrolled');
        }
    }
});

$('.overlay-body').on('click', function(e) {
    $("#close_nav").removeClass("close_nav");
    $(".side_nav").removeClass("expand_nav");
    $("#my_tog").removeClass("close_nav");
    $("#close_nav").attr("id","my_tog");
    $(".overlay-body").removeClass('show_body_overlay');
});

/* =====================================
      Nav-Bar Offset
 ====================================== */

$(".broad .nav-menu .nav-link").on("click", function (event) {
    event.preventDefault();
    off_set= 65;
    if(screen.width > 768){
        off_set = 140;
    }
    $("html,body").animate({
        scrollTop: $(this.hash).offset().top - off_set}, 100);
});

/* ===================================
     Team Carousel
====================================== */

$("#team-slider").owlCarousel({
    items: 5,
    dots: false,
    nav: false,
    loop: true,
    center:true,
    autoplay: true,
    autoplayHoverPause:true,
    slideSpeed: 3000,
    paginationSpeed: 5000,
    smartSpeed:1000,
    responsive: {
        992: {
            items: 3
        },
        768: {
            items: 2
        },
        600: {
            items: 2
        },
        320: {
            items: 1
        },
        280: {
            items: 1
        }
    }
});

/*===================================
    Testimonials Carousel
====================================== */

$(".owl-testimonial").owlCarousel({
    items: 3,
    margin: 30,
    dots: false,
    nav: false,
    loop:true,
    autoplay: true,
    autoplayHoverPause:true,
    responsiveClass:true,
    animateOut: 'zoomOut',
    animateIn: 'zoomIn',
    responsive: {
        992: {
            items: 1
        },
        600: {
            items: 1
        },
        320: {
            items: 1
        },
    }
});

/*===================================
    Portfolio Carousel
====================================== */

$(".team-classic.owl-team").owlCarousel({
    items: 3,
    margin: 30,
    dots: false,
    nav: false,
    loop:true,
    autoplay: true,
    smartSpeed:500,
    navSpeed: true,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive: {
        992: {
            items: 1
        },
        600: {
            items: 1
        },
        320: {
            items: 1
        },
        280: {
            items: 1
        }
    }
});

// Custom Portfolio OWL
$('.ini-customNextBtn').click(function () {
    var owl = $('.team-classic.owl-team');
    owl.owlCarousel();
    owl.trigger('next.owl.carousel');
});
$('.ini-customPrevBtn').click(function () {
    var owl = $('.team-classic.owl-team');
    owl.owlCarousel();
    owl.trigger('prev.owl.carousel', [300]);
});

/* ===================================
        Mouse parallax
 ====================================== */

if ($(window).width() > 991) {
    $('#home-banner').mousemove(function(e) {
        $('[data-depth]').each(function () {
            var depth = $(this).data('depth');
            var amountMovedX = (e.pageX * -depth/4);
            var amountMovedY = (e.pageY * -depth/4);

            $(this).css({
                'transform':'translate3d(' + amountMovedX +'px,' + amountMovedY +'px, 0)',
            });
        });
    });
}

/* ===================================
        Fancy Box
====================================== */

$('[data-fancybox]').fancybox({
    protect: true,
    animationEffect: "fade",
    hash: null,
});

/* ===================================
        Animated Cursor
====================================== */

function animatedCursor() {

    if ($("#animated-cursor").length) {

        var e = {x: 0, y: 0}, t = {x: 0, y: 0}, n = .25, o = !1, a =    document.getElementById("cursor"),
            i = document.getElementById("cursor-loader");
        TweenLite.set(a, {xPercent: -50, yPercent: -50}), document.addEventListener("mousemove", function (t) {
            var n = window.pageYOffset || document.documentElement.scrollTop;
            e.x = t.pageX, e.y = t.pageY - n
        }), TweenLite.ticker.addEventListener("tick", function () {
            o || (t.x += (e.x - t.x) * n, t.y += (e.y - t.y) * n, TweenLite.set(a, {x: t.x, y: t.y}))
        }),
            $(".animated-wrap").mouseenter(function (e) {
                TweenMax.to(this, .3, {scale: 2}), TweenMax.to(a, .3, {
                    scale: 2,
                    borderWidth: "1px",
                    opacity: .2
                }), TweenMax.to(i, .3, {
                    scale: 2,
                    borderWidth: "1px",
                    top: 1,
                    left: 1
                }), TweenMax.to($(this).children(), .3, {scale: .5}), o = !0
            }),
            $(".animated-wrap").mouseleave(function (e) {
                TweenMax.to(this, .3, {scale: 1}), TweenMax.to(a, .3, {
                    scale: 1,
                    borderWidth: "2px",
                    opacity: 1
                }), TweenMax.to(i, .3, {
                    scale: 1,
                    borderWidth: "2px",
                    top: 0,
                    left: 0
                }), TweenMax.to($(this).children(), .3, {scale: 1, x: 0, y: 0}), o = !1
            }),

            $(".testimonial-images .animated-wrap").mouseenter(function (e) {
                TweenMax.to(this, .3, {scale: 2}), TweenMax.to(a, .3, {
                    scale: 2,
                    borderWidth: "1px",
                    opacity: .2
                }), TweenMax.to(i, .3, {
                    scale: 2,
                    borderWidth: "1px",
                    top: 1,
                    left: 1
                }), TweenMax.to($(this).children(), .3, {scale: .5}), o = !0
            }),

            $(".animated-wrap").mousemove(function (e) {
                var n, o, i, l, r, d, c, s, p, h, x, u, w, f, m;
                n = e, o = 2, i = this.getBoundingClientRect(), l = n.pageX - i.left, r = n.pageY - i.top, d = window.pageYOffset || document.documentElement.scrollTop, t.x = i.left + i.width / 2 + (l - i.width / 2) / o, t.y = i.top + i.height / 2 + (r - i.height / 2 - d) / o, TweenMax.to(a, .3, {
                    x: t.x,
                    y: t.y
                }), s = e, p = c = this, h = c.querySelector(".animated-element"), x = 20, u = p.getBoundingClientRect(), w = s.pageX - u.left, f = s.pageY - u.top, m = window.pageYOffset || document.documentElement.scrollTop, TweenMax.to(h, .3, {
                    x: (w - u.width / 2) / u.width * x,
                    y: (f - u.height / 2 - m) / u.height * x,
                    ease: Power2.easeOut
                })
            }),
            $(".hide-cursor,.btn,.tp-bullets").mouseenter(function (e) {
                TweenMax.to("#cursor", .2, {borderWidth: "1px", scale: 2, opacity: 0})
            }), $(".hide-cursor,.btn,.tp-bullets").mouseleave(function (e) {
            TweenMax.to("#cursor", .3, {borderWidth: "2px", scale: 1, opacity: 1})
        }),$(".link").mouseenter(function (e) {
            TweenMax.to("#cursor", .2, {
                borderWidth: "0px",
                scale: 3,
                backgroundColor: "rgba(5,5,5,0.27)",
                opacity: .15
            })
        }), $(".link").mouseleave(function (e) {
            TweenMax.to("#cursor", .3, {
                borderWidth: "2px",
                scale: 1,
                backgroundColor: "rgba(12,12,12,0)",
                opacity: 1
            })
        })
    }
}

if ($(window).width() > 991) {
    setTimeout(function () {
        animatedCursor();
    }, 1000);
}

// File Upload UI Feedback Logic for Careers Apply Form
$(document).ready(function() {
    $('input[name="resume"]').on('change', function() {
        var fileName = this.files.length > 0 ? this.files[0].name : "No file chosen";
        $(this).siblings('.careers-file-name').text(fileName);
    });
});