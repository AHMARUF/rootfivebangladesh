@extends('user.index')

@section('content_user')
<style type="text/css">
.ac-menus a{
        flex: 1 1 auto;
    text-align: center;
    background: #fff;
    border: 0px solid #eee;
    border-radius: 0px;
    padding: 0px;
    box-shadow: none;
    -webkit-transition: all 300ms ease;
    -moz-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
    -o-transition: all 300ms ease;
    transition: all 300ms ease;
}
.ac-menus a:hover{
    border: 0px solid #eee;
    border-radius: 0px;
    padding: 0px;
    box-shadow: none;
}
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Order History</h4>
            <br>
        </div>
        <div class="col-md-12">
           
            <table class="table table-bordered cart-table bg-white" >
                <thead>
                    <tr>
                        <td class="text-left">Product Name</td>
                        <td class="text-left">product_code</td>
                        <td class="text-left">Price</td>
                        <td class="text-left">quantity</td>
                        <td class="text-left ">Total TK</td>

                    </tr>
                </thead>
                <tbody>   
                    @foreach($order_v as $rows)
                    <tr>
                        <td>{{ $rows->product_name }}</td>
                        <td>{{ $rows->product_code }}</td>
                        <td>
                            {{ number_format((float)($rows->Price), 2) }}৳
                        </td>
                        <td>{{ $rows->quantity }}</td>
                        <td>{{ $rows->total }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-8"></div>
        <div class="col-md-4">
        	<table class="table table-bordered" style="margin-top: 60px;">
                <tbody>
                    <tr>
                        <th class="text-right">Home Delivery</th>
                        <th class="text-left">{{ number_format((float)(100), 2) }}৳</th>
                    </tr> 
                    <tr>
                    	@php
                    		$total = DB::table('orders')
                                        ->where('uni',$invoice_id)
                                        ->first();
                    	@endphp
                        <th class="text-right">Total TK</th>
                        <th class="text-left">{{ number_format((float)($total->amount), 2) }}৳</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
        
       

@endsection