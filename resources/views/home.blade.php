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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@extends('layouts.layout')
@section('content')
<!--Start main section -->

<div class="bg-gray content p-tb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="home-slider" style="width: 100%; height: 400px;">
                @php
                    $banner= App\Models\Banner::where('status',1)->orderBy('id',"DESC")->get();
                @endphp
                @foreach($banner as $rows)
                    <div class="slide" style="width: 100%; height: 400px;">
                        <img src="{{ URL::to($rows->image) }}" alt="{{ $rows->title }}"  style="width: 100%; height: 400px;">
                    </div>
                @endforeach
                </div>            
            </div>


           

        </div>


    </div>

   


<div class="container">

<div class="m-home m-cat">
  <h2 class="m-header">Featured Category</h2>
  <p class="m-blurb">Get Your Desired Product from Featured Category!</p>
  <div class="cat-items-wrap">

    
    @foreach($data as $rows)   
        <div class="cat-item">
        <a href="{{ url('accessories/products/'.$rows->cat_name
                ) }}" class="cat-item-inner">
            <span class="cat-icon"><img  src="{{ URL::to($rows->image) }}" alt="All Laptop" width="48" height="48"></span>
            <p>{{ $rows->cat_name }}</p>
        </a>
    </div>

    @endforeach
               
               
               
               
               
              
               
       
    </div>
</div>





<div class="m-product m-home">
  <h2 class="m-header">Latest Products</h2>
  <p class="m-blurb">Check &amp; Get Your Desired Product !</p> 

  <div class="p-items-wrap">


@foreach($data1 as $rows)
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="single-product">
        <div class="product-thumb">
            <a href="{{ url('product/deatils/'.$rows->product_slug) }}">
                <img src="{{ URL::to($rows->image) }}" alt="">
            </a>
        </div>
        <div class="product-title">
            <p>
                <a href="{{ url('product/deatils/'.$rows->product_slug) }}">
                    {{ $rows->product_Name }}
                </a>
            </p>
        </div>
        <div class="product-btns">
            <a href="#" class="btn-small" style="line-height: 25px;">{{ $rows->Price }}&#2547</a>
            @if($rows->quantity==0)
            <script>
                function quantity() {
                  alert("Sorry Sir! Product Out Of Stock");
                }
            </script>
            <a onclick="quantity()" class="btn-round mr-2">
                <i class="fas fa-shopping-cart" style="line-height: 45px; height: 45px; width: 45px;"></i>
            </a>
            @else
            <a href="{{ url('addtocard/'.$rows->id) }}" class="btn-round mr-2">
                <i class="fas fa-shopping-cart" style="line-height: 45px; height: 45px; width: 45px;"></i>
            </a>
            @endif
            @php
            $iid = Auth::id();
            $wish =  DB::table('wishlists')->where('user_id', $iid)->where('product_id', $rows->id)->first();
            @endphp
            @if($wish)
            <a href="{{ url('delete/wishlist/'.$wish->id) }}" class="btn-round">
                <i class="fa fa-heart" style="line-height: 45px; height: 45px; width: 45px;"></i>
            </a>
            @else
            @if(Auth::id())
            <a href="{{ url('add/wishlist/'.$rows->id.'/'.$iid) }}" class="btn-round">
                <i class="far fa-heart" style="line-height: 45px; height: 45px; width: 45px;"></i>
            </a>
            @else
            <a href="{{ route('login') }}" class="btn-round">
                <i class="far fa-heart" style="line-height: 45px; height: 45px; width: 45px;"></i>
            </a>
            @endif
            @endif
            

        </div>
    </div>
</div>
@endforeach
  </div>

</div>

</div>



</div>

<!--End main section -->

@endsection
