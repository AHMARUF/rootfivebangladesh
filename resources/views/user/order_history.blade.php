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
             @php
                $id = Auth::id();
                $history = DB::table('orders')
                                ->where('user_id',$id)
                                ->first();
            @endphp
            @if($history)

            <table class="table table-bordered cart-table bg-white" >
                <thead>
                <tr>
                    <td class="text-center">Invoice ID</td>
                    <td class="text-left">Name</td>
                    <td class="text-left">Issued on</td>
                    <td class="text-left ">Total TK</td>
                    <td class="text-left">Status</td>
                    <td class="text-left">Action</td>
                </tr>
                </thead>
                <tbody>
                    @php
                        $id = Auth::id();
                        $history = DB::table('orders')
                                        ->where('user_id',$id)
                                        ->get();
                    @endphp
                    @foreach($history as $rows)
                    <tr>
                        <td>{{ $rows->invoice_id }}</td>
                        <td>{{ $rows->fastname }} {{ $rows->lastname }}</td>
                        <td>{{ $rows->time }}</td>
                        <td>{{ $rows->amount }}</td>
                        <td><span class="badge badge-danger">{{ $rows->status }}</span></td>
                        <td>
                            <a href={{ url('account/order/view/'.$rows->uni) }}><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>You have not made any previous orders!</p>
            @endif
        </div>
        
    </div>
</div>
        
        
                
@endsection