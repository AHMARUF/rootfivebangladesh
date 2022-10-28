@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container height-100 d-flex justify-content-center align-items-center" style="width: 400px;">
	<form action="{{ url('validate/otp') }}" method="post">
		@csrf
    <div class="position-relative">
        <div class="card p-2 text-center">
            <h6>Please enter the one time password <br> to verify your account</h6>
            <div> <span>A code has been sent to</span> <small>r*****sh@gmail.com</small> </div>
            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
            	<input name="id1" class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
            	<input name="id2" class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
            	<input name="id3" class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
            	<input name="id4" class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
            	<input name="id5" class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
            	<input name="id6" class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" /> 
            </div>
            <div class="mt-4"> <button class="btn btn-danger px-4 validate">Validate</button> </div>
        </div>
        <div class="card-2">
            <div class="content d-flex justify-content-center align-items-center"> <span>Didn't get the code</span> <a href="{{ url('admin/otp') }}" class="text-decoration-none ms-3">Resend</a> </div>
        </div>
    </div>
</form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


