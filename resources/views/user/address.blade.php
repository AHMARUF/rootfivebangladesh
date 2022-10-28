@extends('user.index')

@section('content_user')

@php
$id = Auth::id();
$data = App\Models\User::where('id', $id)->first();
@endphp

<div class="container">
	<div class="row">
        <div class="col-md-12">
            @if(session('address_update'))
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                <span><strong>Well done! &nbsp;</strong> {{ session('address_update') }}</span>
              </div><!-- d-flex -->
            </div><!-- alert -->
            @endif
        </div>
		<div class="col-md-12">
			<div class="ac-title">
				<h1>Address Book</h1>
			</div>
		</div>
		<div class="col-md-12">
			<div class="ac-title-help-text">Please enter the required details to add a new address. </div>
		</div>
		<div class="col-md-12">
			<form action="{{ url('account/address/update') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::id() }}">
        <div class="multiple-form-group">
            <div class="form-group required">
                <label for="input-firstname">First Name</label>
                <input type="text" name="firstname" value="{{ $data->firstname }}" placeholder="First Name" id="input-firstname" class="form-control">
            </div>
            <div class="form-group required">
                <label for="input-lastname">Last Name</label>
                <input type="text" name="lastname" value="{{ $data->lastname }}" placeholder="Last Name" id="input-lastname" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="input-company">Company</label>
            <input type="text" name="company" value="{{ $data->company }}" placeholder="Company" id="input-company" class="form-control">
        </div>
        <div class="form-group required">
            <label for="input-address-1">Address 1</label>
            <input type="text" name="address_1" value="{{ $data->address_1 }}" placeholder="Address 1" id="input-address-1" class="form-control">
        </div>
        <div class="form-group">
            <label for="input-address-2">Address 2</label>
            <input type="text" name="address_2" value="{{ $data->address_2 }}" placeholder="Address 2" id="input-address-2" class="form-control">
        </div>
        <div class="multiple-form-group">
            <div class="form-group required">
                <label for="input-city">City</label>
                <input type="text" name="city" value="{{ $data->city }}" placeholder="City" id="input-city" class="form-control">
            </div>
            <div class="form-group required">
                <label for="input-postcode">Post Code</label>
                <input type="text" name="postcode" value="{{ $data->postcode }}" placeholder="Post Code" id="input-postcode" class="form-control">
                            </div>
        </div>

        <div class="multiple-form-group">
            <div class="form-group required">
                <label for="input-country">Country</label>
                <select name="country" id="input-country" class="form-control">
                    <option value=""> --- Please Select --- </option>
                    <option value="Bangladesh" {{$data->country == "Bangladesh" ? "selected":"" }}>Bangladesh</option>
                </select>
            </div>
            <div class="form-group required">
                <label for="input-zone">Region / State</label>
                <select name="zone" id="input-zone" class="form-control">
                    <option value=""> --- Please Select --- </option>
                    <option value="Chittagong City"{{$data->zone == "Chittagong City" ? "selected":"" }}>Chittagong City</option>
                    <option value="Dhaka City" {{$data->zone == "Dhaka City" ? "selected":"" }}>Dhaka City</option>
                    <option value="Feni City"{{$data->zone == "Feni City" ? "selected":"" }}>Feni City</option>
                    <option value="Others"{{$data->zone == "Others" ? "selected":"" }}>Others</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Continue</button>
    </form>
		</div>
	</div>
</div>

@endsection