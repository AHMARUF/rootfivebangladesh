@extends('user.index')

@section('content_user')
<div class="ac-title">
	<h1>My Account Information</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('account/update') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
				@csrf
				<input type="hidden" name="id" value="{{ Auth::id() }}">
		        <div class="multiple-form-group">
		            <div class="form-group required">
		                <label for="input-firstname">First Name </label>
		                <input type="text" name="firstname" value="{{ Auth::user()->firstname }}" placeholder="First Name" id="input-firstname" class="form-control">
		            </div>
		            <div class="form-group required">
		                <label for="input-lastname">Last Name</label>
		                <input type="text" name="lastname" value="{{ Auth::user()->lastname }}" placeholder="Last Name" id="input-lastname" class="form-control">
		                            </div>
		        </div>
		        <div class="form-group required">
		            <label for="input-email">E-Mail</label>
		            <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="E-Mail"  id="input-email" class="form-control">
		        </div>
		        <div class="form-group required">
		            <label for="input-telephone">Telephone</label>
		            <input type="tel" name="telephone" value="{{ Auth::user()->telephone }}" placeholder="Telephone"  class="form-control">
		        </div>
		        <div class="form-group">
		            <label for="input-fax">Fax</label>
		            <input type="text" name="fax" value="{{ Auth::user()->fax }}" placeholder="Fax" id="input-fax" class="form-control">
		        </div>
			    <button type="submit" class="btn btn-primary">Continue</button>
			</form>
		</div>
	</div>
</div>
@endsection