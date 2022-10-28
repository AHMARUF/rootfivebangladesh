@extends('layouts.layout')

@section('content')

<div class="container ac-layout before-login">
    <div class="panel m-auto">
    <div class="p-head"> <h2 class="text-center">Account Login</h2></div>
        <div class="p-body">
            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
            @csrf    
                <div class="form-group">
                    <label class="control-label {{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}" for="input-username">Phone / E-Mail</label>
                    <input type="text" name="username" value="" placeholder="Phone / E-Mail" id="input-username" class="form-control">
                    @error('username')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label" for="input-password">Password</label>
                    <a class="forgot-password" href="{{ route('password.request') }}">Forgotten Password?</a>
                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                    @error('password')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>

            </form>
            <p class="no-account-text"><span>Don't have an account?</span></p>
            <a class="btn st-outline" href="{{ route('register') }}">Create Your Account</a>
        </div>
    </div>
</div>
@endsection
