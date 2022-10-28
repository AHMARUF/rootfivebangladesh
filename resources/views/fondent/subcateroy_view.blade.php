@extends('layouts.layout')
@section('content')
{{-- <script async src="{{asset ('public/asset/asset/js/listing.min.5.js')}}" type="text/javascript"></script> --}}

<section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb" itemscope itemtype="">
                <li><a href="{{ url('/') }}"><i class="material-icons" title="Home">home</i></a></li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="{{ url('accessories/products/'.$data2->slug) }}" >
                        <span itemprop="name">{{ $data2->cat_name }}</span>
                     </a>
                </li>
                <li>
                    <a itemprop="item" href="{{ url('products/'.$data2->cat_name."/".$data1->slug) }}">
                        <span itemprop="name">{{ $data1->sub_cat_name }}</span>
                     </a>
                </li>
            </ul>
            <div class="child-list">
                @foreach($data4 as $rows)
                <a class="nav-link" href="{{ url('products/'.$data2->cat_name."/".$data1->sub_cat_name."/".$rows->slug)}}">
                    {{ $rows->brand_name }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
  <section class="p-item-page bg-bt-gray p-tb-15">
        <div class="container">
            <div class="row">
                 <div id="rang-slider"style="display: hidden; visibility: none;"></div>
                
                <div id="content" class="col-xs-12 col-md-12 product-listing">
                    <div class="top-bar ws-box">
                        <div class="row">
                            <div class="col-sm-4 col-xs-2 actions">
                                <h6 class="page-heading">{{ $data1->sub_cat_name }}</h6>
                            </div>
                            <div class="col-sm-8 col-xs-10 show-sort">
                               
                            </div>
                        </div>

                    </div>


                    {{-- Product cart start --}}
                    <div class="main-content p-items-wrap">
                        @if($data5==!null)
                        @foreach($data as $rows)
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
                                    <a href="#" class="btn-small mr-2" style="line-height: 25px;">{{ $rows->Price }}&#2547</a>
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
                          @else
                        <div class="empty-content">
                          <span class="icon material-icons">assignment</span>
                          <div class="empty-text ">
                              <h5>Sorry! No Product Founds</h5>
                              <p>Please try searching for something else</p>
                          </div>
                        </div> 
                     
                        @endif
                    </div>

                    <div class="bottom-bar">
                        <div class="row">
                            {{ $data->onEachSide(0)->links('paginte') }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-bottom">
        <div class="container"></div>
    </section>
@endsection
