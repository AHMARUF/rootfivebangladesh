@extends('layouts.layout')
@section('content')
<section class="after-header p-tb-10">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="{{ url('cart') }}">Shopping Cart</a></li>
        </ul>
    </div>
</section>
<style type="text/css">
    .btnb:hover {
    box-shadow: 0 0px rgb(0 0 0 / 20%) inset;
    color: #01ffa0;
    text-decoration: none;
}
    .btnb {
    background: none;
    display: inline-block;
    border: none;
    padding: 0px;
    margin: 0;
    height: 42px;
    line-height: 38px;
    font-size: 14px;
    font-weight: 600;
    color: #01ffa0;
    cursor: pointer;
    border-radius: 4px;
    outline: none;
    text-align: center;
    -webkit-transition: all 300ms linear;
    -moz-transition: all 300ms linear;
    -ms-transition: all 300ms linear;
    -o-transition: all 300ms linear;
    transition: all 300ms linear;
}
</style>
<section class="bg-bt-gray p-tb-15" style="padding-top: 48px;">
    <div class="container">
        <div class="content ws-box p-15">
            <h1 class="title">Shopping Cart </h1>
            @if(Cart::count()>0)
                <div class="table-responsive">
                    <table class="table table-bordered cart-table bg-white">
                        <thead>
                        <tr>
                            <td class="text-center rs-none">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left rs-none">Product Code</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right rs-none">Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::content() as $rows)
                            <tr>
	                            <td class="text-center rs-none">		
	                            	<img src="{{ URL::to($rows->options->images) }}" alt="" title="{{$rows->name}}" class="img-thumbnail" height="80px" width="80px">
	                            </td>
	                            <td class="text-left">{{$rows->name}}</td>
	                            <td class="text-center rs-none">{{$rows->options->product_code}}</td>
	                            <td class="text-left">
	                            	<form style="display:inline-block;" action="{{url('/update-cart')}}" method="POST">
	                            		@csrf
                                        <input type="hidden" name="rowId" value="{{ $rows->rowId }}">
	                            	<div class="input-group btn-block" style="">
	                                    <input type="text" name="quantity" value="{{$rows->qty}}" size="1" class="form-control" style="width: 40px;">
	                                    <span class="input-group-btn">
	                    					<button type="submit" data-toggle="tooltip" title="Update" class="btnb btn btn-primary"><i class="material-icons">cached</i></button>
	                    				</form>
	                    					<button type="button" data-toggle="tooltip" title="Remove" class="btnb btn btn-danger" onclick="event.preventDefault();document.getElementById('{{ $rows->rowId }}').submit();">
	                    						<i class="material-icons">clear</i>
	                    					</button>
	                    					<form id="{{ $rows->rowId }}" method="POST" action="{{url('/delete-to-cart/'.$rows->rowId)}}">
	                    						@csrf 
	                    					</form>

	                    				</span>
	                    			</div>
	                			</td>
	                            <td class="text-right rs-none">{{$rows->price}}৳</td>
	                            <td class="text-right">{{ $rows->total }}৳</td>
                        	</tr>
                        @endforeach
                        </tbody>
                    </table>
                     @else
                    <p>Your shopping cart is empty!</p>
                @endif
                </div>
                 @if(Cart::count()>0)
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered bg-white cart-total">
                        <tbody>
                            <tr>
                                <td class="text-right"><strong>Sub-Total:</strong></td>
                                <td class="text-right amount">{{ number_format((float)(Cart::subtotal()), 2) }}৳</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Home Delivery:</strong></td>
                                <td class="text-right amount">100৳</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right amount">{{ number_format((float)(Cart::total()+100), 2) }}৳</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if(Session::has('coupon_descount'))

                    @else
             <h2 class="title">What would you like to do next?</h2>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            <div class="page-section  coupon-voucher-cart">
                <div class="row">
                	
                    <div class="col-md-6 col-sm-12">
                    	<form action="{{ url('coupon/apply') }}" method="POST">
                             @csrf
                    	<div class="input-group">
                    		
						  <input type="text" name="coupon" value="" placeholder="Coupon Code" class="form-control" >
						  <span class="input-group-btn">
						  	<input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..." class="btn st-outline">
						  </span>
						</form>
						</div>
					</div>
					@endif
                </div>
            </div>
           @endif 
            <div class="buttons" style="border: none;">
            	 @if(Cart::count()>0)
                    <div class="pull-right">
                            <a href="{{ url('checkout') }}" class="btn btn-primary checkout-btn">Confirm Order</a>
                    </div>
                @endif
                <div class="pull-right"><a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a></div>
            </div>
        </div>
            </div>
</section>

@endsection