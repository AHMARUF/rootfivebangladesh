@extends('layouts.admin_layouts')

@section('content')
<div class="row">
	<div class="col-md-6 ">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-6 text-uppercase">
				<h4 class="text-white">Invoice Id</h4>
			</div>
			<div class="col-md-6  col-sm-6 col-6">
				<h4 class="text-white">{{ $order->invoice_id }}</h4>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-6 text-uppercase">
				<h4 class="text-white">Unik Id</h4>
			</div>
			<div class="col-md-6  col-sm-6 col-6">
				<h4 class="text-white text-uppercase">{{ $order->uni }}</h4>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	    <div class="card">
	        <div class="card-body">
	        	<table class="table table-striped mb-0" style="border: none;">
	        		<tr>
	        			<th>Fast Name</th>
	        			<td >{{ $order->fastname }}</td>
	        			<th style="border-left: 1px solid #ccc;">Last Name</th>
	        			<td>{{ $order->lastname }}</td>
	        		</tr>
	        		<tr>
	        			<th>Email</th>
	        			<td>{{ $order->email }}</td>
	        			<th style="border-left: 1px solid #ccc;">Phone</th>
	        			<td>{{ $order->phone }}</td>
	        		</tr>
	        		<tr>
	        			<th>City</th>
	        			<td>{{ $order->city }}</td>
	        			<th style="border-left: 1px solid #ccc;">Zone</th>
	        			<td>{{ $order->zone }}</td>
	        		</tr>
	        		<tr>
	        			<th >Address</th>
	        			<td colspan="3">{{ $order->address }}</td>
	        		</tr>
	        		<tr>
	        			<th>Currency</th>
	        			<td>{{ $order->currency }}</td>
	        			<th style="border-left: 1px solid #ccc;">Date & Time</th>
	        			<td>{{ $order->time }}</td>
	        		</tr>
	        	</table>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-12">
		<div class="card p-4">
	        <div class="card-body">
	        	<div class="row">
	        		<div class="col-md-4 text-center">
	        			@php
				        	$data = strtoupper($order->uni);
				        	$data1 =$order->invoice_id;
				        	$fanal = $data1 ." ". $data;
			        	@endphp
					  	{{QrCode::size(150)->generate($fanal);}}
	        		</div>
	        		<div class="col-md-8">
	        			<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-6 text-uppercase font-weight-bold">
								Product Name
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center text-uppercase font-weight-bold">
								Quantity
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center text-uppercase font-weight-bold">
								Price
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center text-uppercase font-weight-bold">
								Total
							</div>
						</div><hr>
						@php 
							$id=$order->uni; 
							$shapping = App\Models\Shoping::where('uni',$id)->get();
						@endphp
						@foreach($shapping as $rows)
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-6 font-weight-bold">
								{{ $rows->product_name }}
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center font-weight-bold">
								{{ $rows->Price }}
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center font-weight-bold">
								{{ $rows->quantity }}
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center font-weight-bold">
								{{ $rows->total }}
							</div>
						</div>
						<hr>
						@endforeach
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-8 text-uppercase font-weight-bold text-right">
								Home Delivery	
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-right text-uppercase font-weight-bold">
								{{ number_format((float)(100), 2) }}৳
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-8 text-uppercase font-weight-bold text-right">
								Total Amaunt
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-right text-uppercase font-weight-bold">
								{{ number_format((float)($order->amount), 2) }}৳
							</div>
						</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>
	<div class="col-md-12">
		<a href="{{ url('/prnpriview/'.$order->uni) }}" class="btn waves-effect waves-light btn-primary  m-b-10">Print</a>

		<a href="{{ url('/order/completed/'.$order->uni) }}" class="btn waves-effect waves-light btn-primary  m-b-10">Completed</a>
                      

	</div>
</div>
@endsection