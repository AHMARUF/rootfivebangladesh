@extends('user.index')

@section('content_user')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="ac-title"><h1>My Wish List</h1></div>
        </div>
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
        <div class="col-md-12">
            @php
            $id = Auth::id();
            $data1 = DB::table('wishlists')
                                ->where('user_id',$id)
                                ->first();
            $data = DB::table('wishlists')
                                ->where('user_id',$id)
                                ->get();
            @endphp
            @if ($data1)
            @foreach($data as $rows)
            <div class="cards">
                        <div class="card">
            <div class="img-n-title">
                <div class="img-wrap">
                    <a href="{{ url('product/deatils/'.$rows->product_slug) }}">
                        <img src="{{ URL::to($rows->image) }}" alt="{{ $rows->product_slug }}" title="{{ $rows->product_slug }}">
                    </a>
                </div>
                <div class="title">
                    <h6 class="item-name"><a href="{{ url('product/deatils/'.$rows->product_slug) }}">{{ $rows->product_name }}</a></h6>
                    <p>In Stock</p>
                </div>
            </div>
            <div class="amount">{{ number_format((float)($rows->Price), 2) }}৳</div>
            <div class="actions">
                <button type="submit"  onclick="event.preventDefault(); document.getElementById('{{ $rows->product_slug }}').submit();"  title="Buy Now" class="btn ac-btn">Buy Now</button>
                <form id="{{ $rows->product_slug }}" method="get" action="{{ url('addtocard/'.$rows->product_id) }}">
                    @csrf
                </form>
                <a href="{{url ('account/wishlist/'.$rows->id) }}" title="Remove" class="ac-ico"><span class="material-icons">delete</span></a>
            </div>
        </div>
        </div>
        @endforeach 
         @else
            <p>Your wish list is empty.</p> 
        @endif        
        </div>
        
    </div>
</div>
        
        
                
@endsection