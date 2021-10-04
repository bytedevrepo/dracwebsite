<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }} | Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend-assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('backend-assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend-assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    @yield('css')
    <style>
        .dashboard-wrapper {
            position: relative;
            left: 0;
            margin-left: 264px;
            min-height: 85vh !important;
        }
    </style>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    @if(auth()->check())
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('backend-assets/images/avatar-1.jpg') }}" alt="" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        {{ auth()->user()->name }}
                                    </h5>
                                </div>
                                {{--<a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>--}}
                                {{--<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>--}}
                                <form method="POST" action="{{ route('logout') }}">

                                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-link">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column mt-2">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::segment(2) == 'post') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">
                                <i class="fab fa-fw fa-firefox"></i>
                                Pages
                            </a>
                            <div id="submenu-1" class="submenu {{ (Request::segment(2) == 'post') ? 'open' : 'collapse' }}" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::currentRouteName() == 'admin.post.create' ? 'active' : '' }}" href="{{ route('admin.post.create') }}">Add new</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::currentRouteName() == 'admin.post.index' ? 'active' : '' }}" href="{{ route('admin.post.index') }}">All Pages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::currentRouteName() == 'admin.category.index' ? 'active' : '' }}" href="{{ route('admin.category.index') }}">All Categories</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'admin.menu.index' ? 'active' : '' }} " href="{{ route('admin.menu.index') }}">
                                <i class="fab fa-fw fa-stack-exchange"></i>
                                Menu
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @yield('page-header')
                    @include('backend._partials.alert')
                    @include('backend._partials.validation-error')
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <div class="footer">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    Copyright © <?=date('Y') ?> {{ config('app.name', 'Laravel') }}. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('backend-assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('backend-assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('backend-assets/libs/js/main-js.js') }}"></script>
<script src="{{ asset('backend-assets/vendor/nestable/jquery.nestable.js') }}"></script>
@yield('script')
</body>

</html>
