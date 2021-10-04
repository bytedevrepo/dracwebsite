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

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <base href="http://localhost/dracweb/public">
    <style>

        body, html {
            height: 100% !important;
            margin: 0 !important;
        }

        .bg {
            display:none;
            height: 100% !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
    </style>

</head>
<body id="episoda-body">
<?php $bg = \App\Models\Cms::where('key', 'home_background')->first(); $bg_img = $bg->value?>
<div class="bg" style="background-image: url({{ asset('uploads/'.$bg_img) }})"></div>
<div id="app">
    <container/>
</div>
<script>
    window.ASSET_URL = {!! json_encode(config('app.url').'/uploads/') !!};
</script>
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('frontend-assets/site/libs/jquery/dist/jquery.min.js') }}"></script>
{{--<script src="{{ asset('frontend-assets/radial/jquery-1.9.1.min.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('frontend-assets/site/libs/OwlCarousel2/dist/owl.carousel.min.js') }}"></script>

</body>
</html>
