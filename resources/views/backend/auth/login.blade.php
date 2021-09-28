@extends('backend.layouts.guest')
@section('content')
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center">
           <h1> <a href="/">{{ config('app.name', 'Laravel') }}</a></h1>
            <span class="splash-description">Please enter your user information.</span>
        </div>
        <div class="card-body">
            @if($errors->any())
                {{ implode('', $errors->all('<div class="alert alert-danger" role="alert">:mesasge</div> ')) }}
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-lg" id="email" name="email" :value="old('email')" type="text" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password" required autocomplete="current-password">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" >Sign in</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="footer-link">Forgot Password
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
