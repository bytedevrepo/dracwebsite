<!DOCTYPE html>
<html lang="en" class="episoda-overflow-hidden">
<head>

    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Start Template Basic Images -->
    <meta property="og:image" content="img/authon.jpg">
    <link rel="icon" href="img/favicon/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png">
    <!-- End Template Basic Images -->

    <!-- Start Custom Browsers Color -->
    <meta name="theme-color" content="#000">
    <!-- End Custom Browsers Color -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- Start CSS files -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/site/libs/bootstrap/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/site/libs/bootstrap/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/site/libs/OwlCarousel2/dist/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/site/css/main.css') }}">
    <!-- End CSS files -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/style.css') }}">
</head>

<body id="episoda-body" >
<div id="app">
    <container/>
</div>
<!-- End Pop-up window -->

<!-- Start JavaScript files -->

<script src="{{ mix('/js/app.js') }}" ></script>
<script src="{{ asset('frontend-assets/site/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('frontend-assets/site/libs/OwlCarousel2/dist/owl.carousel.min.js') }}"></script>
{{--<script src="{{ asset('frontend-assets/site/js/scripts.js') }}"></script>--}}

<!-- End JavaScript files -->
<script>
    // var owl = $('#episoda-header-slider'),
    //     URLHash = window.location.hash;
    // window.owlC = owl;
    // var owlOptions = {
    //         items: 1,
    //         loop: true,
    //         nav: true,
    //         navText: ['<i class="episoda-left-arrow"></i>Prev', 'Next<i class="episoda-right-arrow"></i>'],
    //         autoplay: true,
    //         autoplayTimeout: 60000,
    //         animateIn: 'fadeIn',
    //         animateOut: 'fadeOut',
    //         URLhashListener: true,
    //         startPosition: 'URLHash'
    //     };

    // owl.owlCarousel(owlOptions);
    //
    // var allowTransitionLeft = true;
    // var allowTransitionRight = true;
    //
    // function slideNav(slider) {
    //     //Firefox:
    //     slider.on('DOMMouseScroll', '.owl-stage', function (e) {
    //         if (e.originalEvent.detail > 0) {
    //             if (allowTransitionRight) {
    //                 allowTransitionRight = false;
    //                 slider.trigger('next.owl');
    //             }
    //         } else {
    //             if (allowTransitionLeft) {
    //                 allowTransitionLeft = false;
    //                 slider.trigger('prev.owl');
    //             }
    //         }
    //         e.preventDefault();
    //     }).on('translated.owl.carousel', function () {
    //         allowTransitionLeft = true;
    //         allowTransitionRight = true;
    //     });
    //
    //     //Chrome, IE
    //     slider.on('mousewheel', '.owl-stage', function (e) {
    //         if (e.originalEvent.wheelDelta > 0) {
    //             if (allowTransitionLeft) {
    //                 allowTransitionLeft = false;
    //                 slider.trigger('prev.owl');
    //             }
    //         } else {
    //             if (allowTransitionRight) {
    //                 allowTransitionRight = false;
    //                 slider.trigger('next.owl');
    //             }
    //         }
    //         e.preventDefault();
    //     }).on('translated.owl.carousel', function () {
    //         allowTransitionLeft = true;
    //         allowTransitionRight = true;
    //     });
    //
    //     $(document).on('keydown', function (e) {
    //         if ($('#preloader').css('display') === 'none') {
    //             if (e.keyCode === 39 || e.keyCode === 40) {
    //                 if (allowTransitionRight) {
    //                     allowTransitionRight = false;
    //                     slider.trigger('next.owl');
    //                 }
    //             }
    //             if (e.keyCode === 37 || e.keyCode === 38) {
    //                 if (allowTransitionLeft) {
    //                     allowTransitionLeft = false;
    //                     slider.trigger('prev.owl');
    //                 }
    //             }
    //         }
    //     }).on('translated.owl.carousel', function () {
    //         allowTransitionLeft = true;
    //         allowTransitionRight = true;
    //     });
    // }
    //
    // slideNav(owl);
    //
    // function counter(slider, counter) {
    //     var item = slider.find('.owl-dot.active').index() + 1,
    //         items = slider.find('.owl-dot').length;
    //
    //     item = item < 10 ? '0' + item : item;
    //     items = items < 10 ? '0' + items : items;
    //
    //     counter.html('<span class="episoda-slide-current">' + item + '</span><span class="episoda-slide-total">' + items + '</span>');
    // }
    //
    // var counterBox = $('#episoda-counter');
    //
    // counter(owl, counterBox);
    //
    // owl.on('changed.owl.carousel', function () {
    //     counter(owl, counterBox);
    // });


</script>
</body>


</html>
