@extends('layouts.layout')
@section('content')
{{-- <script async src="{{asset ('public/asset/asset/js/listing.min.5.js')}}" type="text/javascript"></script> --}}

<section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb" itemscope itemtype="">
                <li><a href="{{ url('/') }}"><i class="material-icons" title="Home">home</i></a></li>
                <li itemprop="itemListElement" itemscope itemtype="">
                	<a itemtype="" itemprop="item" href="{{ url('/') }}"><span itemprop="name">Home</span></a>
                    <meta itemprop="position" content="1" />
                </li>
            </ul>
        </div>
    </section>
  <section class="p-item-page bg-bt-gray p-tb-15">
        <div class="container">
            <div class="row">
                 <div id="rang-slider"style="display: hidden; visibility: none;"></div>
    
                <div id="content" class="col-xs-12 col-md-12 product-listing">
                   

                    {{-- Product cart start --}}
                    <div class="main-content p-items-wrap">
                       @if (isset($data3)) 
                    	@foreach($data3 as $rows)
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
                                    <a href="#" class="btn-small mr-2" style="line-height: 25px;">{{ $rows->Price }} &#2547</a>
                                    <a href="{{ url('addtocard/'.$rows->id) }}" class="btn-round mr-2">
                                        <i class="fa fa-shopping-cart" style="line-height: 45px; height: 45px; width: 45px;"></i>
                                    </a>
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
                                        <i class="fa fa-heart-o" style="line-height: 45px; height: 45px; width: 45px;"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn-round">
                                        <i class="fa fa-heart-o" style="line-height: 45px; height: 45px; width: 45px;"></i>
                                    </a>
                                    @endif
                                    @endif
                                    

                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                    <div class="bottom-bar">
                        <div class="row pagination-row">
                            {{ $data3->onEachSide(0)->links('paginte') }} 
                        </div>
                    </div>
                     
                </div>
                @else
                <div class="main-content" style="width: 100%;">
                    <div class="empty-content bg-white">
                        <span class="icon material-icons">assignment</span>
                        <div class="empty-text ">
                            <h5>Sorry! No Product Founds</h5>
                            <p>Please try searching for something else</p>
                        </div>
                    </div>
                </div>
                 @endif
            </div>
        </div>
    </section>
@endsection