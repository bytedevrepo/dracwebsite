@extends('backend.layouts.guest')
@section('content')
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center">
                <h1> <a href="/">{{ config('app.name', 'Laravel') }}</a></h1>
                <span class="splash-description">Please enter your email address.</span>
            </div>
            <div class="card-body">
                @include('backend.auth.validation-error')
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <p>We'll send you an email to reset your password.</p>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus  placeholder="Your Email">
                    </div>
                    <div class="form-group pt-1">
                        <button type="submit" class="btn btn-block btn-primary btn-xl">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <span>Already have an account? <a href="{{ route('login') }}">Login</a></span>
            </div>
        </div>
    </div>
@stop
