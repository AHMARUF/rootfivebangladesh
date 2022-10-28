@extends('layouts.layout')

@section('content')


<div class="container ac-layout">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

    <div class="panel m-auto">
        <div class="p-head"> <h2 class="text-center">Forgot Your Password?</h2></div>
        <div class="p-body">
            <form action="{{ route('password.email') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group required">
                    <label for="input-username">Enter Your  E-Mail</label>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Enter Your  E-Mail" id="input-username" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Continue</button>
            </form>
        </div>
    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    

                    <form method="POST" >
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
