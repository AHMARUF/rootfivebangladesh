@extends('layouts.admin_layouts')

@section('content')
    

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Signin</h4>
                        <div class="col-md-12">
                            @if ($errors->has('username'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif

                            @if ($errors->has('email'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <br>
                            @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <form method="post" action="{{ route('admin.login') }}">
                        {{ csrf_field() }}
                        <div class="form-group mb-3 {{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}">
                            <label class="floating-label" for="username">Email or Username</label>
                            <input id="username" type="text"  name="username" value="{{ old('username') }}"  class="form-control" id="username">
                        </div>
                            
                        <div class="form-group mb-4 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="floating-label" for="Password">Password</label>

                            <input type="password" name="password" class="form-control" id="Password" placeholder="">
                        </div>
                            
                        <button class="btn btn-block btn-primary mb-4">Signin</button>
                        </form>
                        <p class="mb-2 text-muted">Forgot password? <a href="{{ route('password.request') }}" class="f-w-400">Reset</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->
   
                    
@endsection
