@extends('user.index')

@section('content_user')
<div class="ac-title">
	<h1>Change Password</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			@if(session('change_pass'))
			<div class="alert alert-success" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
			    <span><strong>Well done! &nbsp;</strong> {{ session('change_pass') }}</span>
			  </div><!-- d-flex -->
			</div><!-- alert -->
			@endif
		</div>
		<div class="col-md-12">
			<div class="ac-title-help-text">
				Please type and confirm to change your current password.
			</div>
		</div>
		<div class="col-md-12">
			<form action="{{ url('account/password/change') }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{ Auth::id() }}">
				<div class="form-group required">
				    <label for="password">Password</label>
				    <input type="password" name="password" value="" placeholder="Password" id="password" class="form-control" onkeyup='check();'>
				</div>
			    <div class="form-group required">
			        <label for="confirm_password">Password Confirm</label>
			        <input type="password" name="confirm_password" placeholder="Password Confirm" id="confirm_password" class="form-control" onkeyup='check();'>
			        <span id='message' style="display: none;"></span>
			    </div>
			    <style type="text/css">
			    	.disabled{
			    		 pointer-events:none;
			    	}
			    </style>
			    <button type="submit" id="btn_show" class="btn btn-primary disabled">Continue</button>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
    $('#btn_show').removeClass('disabled');
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
@endsection