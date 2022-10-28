@extends('layouts.layout')
@section('content')
<section class="after-header p-tb-10">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="{{ url('cart') }}">Shopping Cart</a></li>
            <li><a href="{{ url('checkout') }}">Checkout</a></li>
        </ul>
    </div>
</section>
@php
$id = Auth::id();
$user = App\Models\User::where('id', $id)->first();
@endphp
<section class="checkout bg-bt-gray p-tb-15">
    <div class="container">   
        <h1 class="page-title">Checkout</h1>
        <form action="{{ url('/pay') }}" class="checkout-content" method="POST">
        	@csrf
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="page-section ws-box">
                        <div class="section-head">
                            <h2>Customer Information</h2>
                        </div>
                        <div class="address">
                            <div class="multiple-form-group">
                                <div class="form-group">
                                    <label class="control-label" for="firstname">First Name</label>
                                    <input class="form-control" name="firstname" type="text" id="firstname"  placeholder="First Name*" value="{{ $user->firstname }}">
                                 </div>
                                <div class="form-group">
                                    <label class="control-label" for="lastname">Last Name</label>
                                    <input type="text" id="lastname" name="lastname"  class="form-control" placeholder="Last Name*" value="{{ $user->lastname }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="address">Address</label>
                                <input type="text" id="address" name="address_1" class="form-control" placeholder="Address*" value="{{ $user->address_1 }}">
                            </div>
                           <div class="form-group">
                               <label class="control-label" for="mobile">Mobile</label>
                               <input type="tel" id="mobile" name="telephone" class="form-control" placeholder="Telephone*"value="{{ $user->telephone }}">
                            </div>
                            <div class="form-group" for="email">
                                <label class="control-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail*" value="{{ $user->email }}">
                                                            </div>
                            <div class="multiple-form-group">
                                <div class="form-group" for="city">
                                    <label class="control-label">City</label>
                                    <input type="text" id="city" name="city" class="form-control" placeholder="City*" value="{{ $user->city }}">
                                </div>
                                <div class="form-group" for="zone">
                                    <label class="control-label">Zone</label>
                                    <select name="zone" id="zone" class="form-control">
                                        <option {{ "Chittagong City"==$user->zone ? "selected":"" }} value="Chittagong City">Chittagong City</option>
                                        <option {{ "Dhaka City"==$user->zone ? "selected":"" }} value="Dhaka City">Dhaka City</option>
                                        <option {{ "Feni City"==$user->zone ? "selected":"" }} value="Feni City">Feni City</option>
                                        <option {{ "Others"==$user->zone ? "selected":"" }} value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row row-payment-delivery-order">
                        <div class="col-md-12 col-sm-12 details-section-wrap">
                            <div class="page-section ws-box">
                                <div class="section-head">
                                    <h2>Order Overview</h2>
                                </div>
                                <table class="table-bordered bg-white checkout-data">
                                    <thead>
                                        <tr>
                                            <td>Product Name</td>
                                            <td class="rs-none">Price</td>
                                            <td class="rs-none">Quantity</td>
                                            <td class="text-right">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::content() as $rows)
                                        <tr>
                                            <td class="name">
                                               {{$rows->name}} 
                                            </td>
                                            <td class="rs-none">{{$rows->price}}৳   </td>
                                            <td class="rs-none">{{$rows->qty}}</td>
                                            <td class="price text-right">{{ $rows->total }}৳</td>
                                        </tr>
                                        @endforeach
                                        <tr class="total">
                                            <td colspan="3" class="text-right">
                                                <strong>Sub-Total:</strong>
                                            </td>
                                            <td class="text-right">
                                                <span class="amount">{{ number_format((float)(Cart::subtotal()), 2) }}৳</span>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="3" class="text-right">
                                                <strong>Home Delivery:</strong>
                                            </td>
                                            <td class="text-right">
                                                <span class="amount">100৳</span>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="3" class="text-right">
                                                <strong>Total:</strong>
                                            </td>
                                            <td class="text-right">
                                                @php

                                                @endphp
                                                <span class="amount">{{ number_format((float)(Cart::total() + 100), 2) }}৳</span>
                                                <input type="hidden" name="amount" id="total_amount" value="{{ 100+Cart::total()}}" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="page-section ws-box voucher-coupon">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12" id="discount-coupon">
                                        <div class="input-group">
                                            <input type="text" name="coupon" placeholder=" Coupon Code" id="input-coupon" class="form-control">
                                            <span class="input-group-btn"><button type="button" id="button-coupon" data-loading-text="Loading..." class="btn st-outline">Apply Coupon</button></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                                </div>
                </div>
            </div>
            <div class="checkout-final-action">

                <div class="agree-text" style="margin-bottom: 10px">
                    I have read and agree to the 
                    <a href="warranty-policy" target="_blank">
                        <b>Terms and Conditions</b>
                    </a>, 
                    <a href="privacy" target="_blank">
                        <b>Privacy Policy</b>
                    </a> and 
                    <a href="refund-policy" target="_blank">
                        <b>Refund and Return Policy</b>
                    </a> 
                    <input type="checkbox" name="agree" value="1" checked="checked">
                </div>
                <button class="btn submit-btn pull-right" type="submit">Confirm Order</button>
            </div>
        </form>

    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
@endsection