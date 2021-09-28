<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('frontend.layouts.header')
<body>

@yield('content')

<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
@yield('script')
</body>
</html>
