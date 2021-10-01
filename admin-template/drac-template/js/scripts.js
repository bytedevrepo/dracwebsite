$(function () {

    "use strict";

    /* Preloader */
    var autoPreloader = false,
        perfData = window.performance.timing,
        EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
        time = parseInt((EstimatedTime / 1000) % 60, 10) * 100;

    function episodaToggleClass() {
        $('html').toggleClass('episoda-overflow-hidden');
        $('.episoda-main-content').toggleClass('episoda-blur');
    }

    $('.episoda-ico-scroll').on('click', function () {
        $('.episoda-preloader').fadeOut(500);
        episodaToggleClass();
    });

    if (autoPreloader) {

        setTimeout(function () {
            $('.episoda-preloader').fadeOut(500);
            episodaToggleClass();
        }, time);

    } else {

        setTimeout(function () {

            $('.episoda-animated-dots').fadeOut(500);
            $('.episoda-ico-scroll').addClass('episoda-active');

            //Firefox:
            $('#preloader').on('DOMMouseScroll', function (e) {
                if ($('#preloader').css('display') === 'block') {
                    if (e.originalEvent.detail > 0) {
                        $('.episoda-preloader').fadeOut(300);
                        $('html').removeClass('episoda-overflow-hidden');
                        $('.episoda-main-content').removeClass('episoda-blur');
                    }
                }
                e.preventDefault();
            });

            //Chrome, IE
            $('#preloader').on('mousewheel', function (e) {
                if ($('#preloader').css('display') === 'block') {
                    if (e.originalEvent.wheelDelta < 0) {
                        $('.episoda-preloader').fadeOut(300);
                        $('html').removeClass('episoda-overflow-hidden');
                        $('.episoda-main-content').removeClass('episoda-blur');
                    }
                }
                e.preventDefault();
            });

            $(document).on('keydown', function (e) {
                if ($('#preloader').css('display') === 'block') {
                    if (e.keyCode === 39 || e.keyCode === 40) {
                        $('.episoda-preloader').fadeOut(300);
                        $('html').removeClass('episoda-overflow-hidden');
                        $('.episoda-main-content').removeClass('episoda-blur');
                    }
                }
            });

        }, time);
    }


    /* Header, gallery slider */
    var owl = $('#episoda-header-slider'),
        owlGallery = $('#episoda-gallery-slider'),
        URLHash = window.location.hash;

    var owlOptions = {
            items: 1,
            loop: true,
            nav: true,
            navText: ['<i class="episoda-left-arrow"></i>Prev', 'Next<i class="episoda-right-arrow"></i>'],
            autoplay: true,
            autoplayTimeout: 60000,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            URLhashListener: true,
            startPosition: 'URLHash'
        },

        owlGalleryOptions = {
            items: 1,
            loop: true,
            nav: true,
            navText: ['<i class="episoda-left-arrow"></i>Prev', 'Next<i class="episoda-right-arrow"></i>'],
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
        }

    owl.owlCarousel(owlOptions);
    owlGallery.owlCarousel(owlGalleryOptions);

    var allowTransitionLeft = true;
    var allowTransitionRight = true;

    function slideNav(slider) {
        //Firefox:
        slider.on('DOMMouseScroll', '.owl-stage', function (e) {
            if (e.originalEvent.detail > 0) {
                if (allowTransitionRight) {
                    allowTransitionRight = false;
                    slider.trigger('next.owl');
                }
            } else {
                if (allowTransitionLeft) {
                    allowTransitionLeft = false;
                    slider.trigger('prev.owl');
                }
            }
            e.preventDefault();
        }).on('translated.owl.carousel', function () {
            allowTransitionLeft = true;
            allowTransitionRight = true;
        });

        //Chrome, IE
        slider.on('mousewheel', '.owl-stage', function (e) {
            if (e.originalEvent.wheelDelta > 0) {
                if (allowTransitionLeft) {
                    allowTransitionLeft = false;
                    slider.trigger('prev.owl');
                }
            } else {
                if (allowTransitionRight) {
                    allowTransitionRight = false;
                    slider.trigger('next.owl');
                }
            }
            e.preventDefault();
        }).on('translated.owl.carousel', function () {
            allowTransitionLeft = true;
            allowTransitionRight = true;
        });

        $(document).on('keydown', function (e) {
            if ($('#preloader').css('display') === 'none') {
                if (e.keyCode === 39 || e.keyCode === 40) {
                    if (allowTransitionRight) {
                        allowTransitionRight = false;
                        slider.trigger('next.owl');
                    }
                }
                if (e.keyCode === 37 || e.keyCode === 38) {
                    if (allowTransitionLeft) {
                        allowTransitionLeft = false;
                        slider.trigger('prev.owl');
                    }
                }
            }
        }).on('translated.owl.carousel', function () {
            allowTransitionLeft = true;
            allowTransitionRight = true;
        });
    }

    slideNav(owl);
    slideNav(owlGallery);

    function counter(slider, counter) {
        var item = slider.find('.owl-dot.active').index() + 1,
            items = slider.find('.owl-dot').length;

        item = item < 10 ? '0' + item : item;
        items = items < 10 ? '0' + items : items;

        counter.html('<span class="episoda-slide-current">' + item + '</span><span class="episoda-slide-total">' + items + '</span>');
    }

    var counterBox = $('#episoda-counter'),
        counterGalleryBox = $('#episoda-gallery-counter');

    counter(owl, counterBox);
    counter(owlGallery, counterGalleryBox);

    owl.on('changed.owl.carousel', function () {
        counter(owl, counterBox);
    });
    owlGallery.on('changed.owl.carousel', function () {
        counter(owlGallery, counterGalleryBox);
    });

    window.dispatchEvent(new Event('resize'));

    $('.episoda-slide-info').hover(function () {
        $('#episoda-gallery-slider .owl-nav').toggleClass('owl-nav-hidden');
    });


    /* Audio button */
    var playing,
        audio = document.getElementById('episoda-audio-bg');

    function isPlaying(audio) {
        return !audio.paused;
    }

    setTimeout(function () {
        playing = isPlaying(audio);
        if (playing === true) {
            $('.episoda-audio-btn .episoda-equalizer').addClass('episoda-equalizer-start');
            $('.episoda-audio-btn .episoda-label-play').hide();
        } else {
            $('.episoda-audio-btn .episoda-label-pause').hide();
        }
    }, 300);

    $('.episoda-audio-btn').on('click', function () {
        if (playing === false) {
            audio.play();
            $('.episoda-audio-btn .episoda-equalizer').addClass('episoda-equalizer-start');
            playing = true;
            $('.episoda-audio-btn .episoda-label-pause').show();
            $('.episoda-audio-btn .episoda-label-play').hide();
        } else {
            audio.pause();
            $('.episoda-audio-btn .episoda-equalizer').removeClass('episoda-equalizer-start');
            playing = false;
            $('.episoda-audio-btn .episoda-label-play').show();
            $('.episoda-audio-btn .episoda-label-pause').hide();
        }
    });


    /* Menu panel, button */
    $('.episoda-pop-up-btn, .episoda-ico-close').on('click', function (e) {
        e.preventDefault();
        var popUpWindow = $(this).attr('href');
        if ($(popUpWindow).length) {
            $(popUpWindow).toggleClass('episoda-active');
            episodaToggleClass();
            if ($('.episoda-pop-up-window.episoda-active').length > 1) {
                $('.episoda-pop-up-window.episoda-active').addClass('episoda-blur');
                $(popUpWindow).removeClass('episoda-blur');
            } else {
                $('.episoda-pop-up-window.episoda-active').removeClass('episoda-blur');
            }
        } else {
            return false;
        }
    });

    $('.episoda-menu .episoda-menu-item').on('click', function () {
        $('.episoda-pop-up-window').removeClass('episoda-active');
        episodaToggleClass();
    })

    function episodaActiveMenuItem(activeItem) {
        $('.episoda-menu .episoda-menu-item').removeClass('episoda-active');
        if (activeItem) {
            $('.episoda-menu-item a[href=\"' + activeItem + '\"]').parent().addClass('episoda-active');
        } else {
            $('.episoda-menu').find('.episoda-menu-item:first-of-type').addClass('episoda-active');
        }
    }

    episodaActiveMenuItem(URLHash);

    $(window).on('hashchange', function () {
        URLHash = window.location.hash;
        episodaActiveMenuItem(URLHash);
    });

    /* Set Menu item height */
    var episodaMenuItemWidth;

    function episodaMenuItemHeight() {
        episodaMenuItemWidth = $('#menu .episoda-menu-item').width();
        $('#menu .episoda-menu-item').height(episodaMenuItemWidth / 1.5);
    }

    episodaMenuItemHeight();

    $(window).on('resize', function () {
        episodaMenuItemHeight();
    });


    /* Contact form script */
    if ($('.episoda-contact-form').length) {
        $('.episoda-contact-form .episoda-input').blur(function () {
            if (this.value) {
                $(this).addClass('episoda-label-up');
            } else {
                $(this).removeClass('episoda-label-up');
            }
        });
    }


    /* Correction of behavior on touchscreens */
    $('*').on('touchstart', function () {
        $(this).trigger('hover');
    }).on('touchend', function () {
        $(this).trigger('hover');
    });

});