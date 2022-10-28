@extends('layouts.layout')

@section('content')
 <div class="container ac-layout before-login">
    <div class="panel m-auto">
        <div class="p-head">
            <h2 class="text-center">Register Account</h2>
        </div>
        <div class="p-body">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="multiple-form-group">
                    <div class="form-group required">
                        <label for="input-firstname">First Name</label>
                        <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control @error('firstname') is-invalid @enderror">
                        @error('firstname')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group required">
                        <label for="input-lastname">Last Name</label>
                        <input type="text" name="lastname" placeholder="Last Name" id="input-lastname" class="form-control @error('lastname') is-invalid @enderror">
                        @error('lastname')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>

                <div class="form-group required">
                    <label for="input-email">E-Mail</label>
                    <input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group required">
                    <label for="input-telephone">Telephone</label>
                    <input type="tel" name="telephone" value="" placeholder="Telephone" id="input-telephone" class="form-control @error('telephone') is-invalid @enderror">
                     @error('telephone')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group required">
                    <label for="input-password">Password</label>
                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control @error('password') is-invalid @enderror" aria-autocomplete="list">
                    @error('password')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group required">
                    <label for="input-confirm">Password Confirm</label>
                    <input type="password" name="password_confirmation" value="" placeholder="Password Confirm" id="input-confirm" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Continue</button>
                <p class="no-account-text"><span>Already have an account?</span></p>
                <p>If you already have an account with us, please login at the <a href="{{ route('login') }}">login page</a>.</p>
            </form>
        </div>
    </div>
</div>
@endsection
