<html dir="ltr" lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ config('app.name') }}</title>
    <!-- <base href=""> -->
    <meta name="description" content="">        
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('public/asset/asset/img/logo.png') }}" rel="icon">        
    <link href="{{asset ('public/asset/asset/css/stylesheet.min.5.css') }}" rel="stylesheet">
    <link href="{{asset ('public/asset/asset/css/pc-builder.css') }}" rel="stylesheet">
    
    <script async="" src="{{asset ('public/asset/asset/js/site.min.5.js') }}" type="text/javascript"></script>
    <script async="" src="{{asset ('public/asset/asset/js/html2canvas.min.js') }}" type="text/javascript"></script>
    {{-- <script async src="{{asset ('public/asset/asset/js/listing.min.5.js')}}" type="text/javascript"></script> --}}
   {{--  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
   <link rel="stylesheet" href="{{asset ('public/asset/asset/fontawesome/css/all.css')}}">
   
    <script type="text/javascript">
        var app = {
            mgs_type: "popup",
            enablePopup: true,
            popupDuration: 6,
            onReady: function(d, a, e, f, t) {
                a = Array.isArray(a) ? a : [a];
                t = t || 2E3;
                for (var g = !0, b = d, c = 0; c < a.length; c++) {
                    var h = a[c];
                    if ("undefined" == typeof b[h]) {
                        g = !1;
                        break
                    }
                    b = b[h]
                }
                g ? e() : f && setTimeout(function() {
                    app.onReady(d, a, e, --f)
                }, t)
            }
        };
    </script>
    


</head>
<body class="common-home ">

  <style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<header id="header">
<!--  top  navbar start -->
    <div class="top">
        <div class="container">
            <div class="ht-item logo">
                <div class="mbl-nav-top h-desk">
                    <div id="nav-toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <a class="brand" href="{{ url('/') }}"><img src="{{ asset('public/asset/asset/img/logo.png') }}" title="Star Tech &amp; Engineering Ltd " width="144" height="164" alt="Star Tech &amp; Engineering Ltd "></a>
                <div class="mbl-right h-desk">
                    <div class="ac search-toggler"><i class="material-icons">search</i></div>
                    <div class="ac mc-toggler"><i class="material-icons">shopping_basket</i><span class="counter" data-count="0">{{ Cart::count(); }}</span></div>
                </div>
            </div>
            <div class="ht-item search" id="search">
                <form method="get" action="{{ url('/search') }}">
                <input type="text" name="search" placeholder="Search" autocomplete="off">
                <div class="dropdown-menu">
                <div class="search-details">
                    <ul class="nav nav-tabs">
                        <li data-tab="tab-prod" class="active">Products</li>
                        <li data-tab="tab-cat">Categories</li>
                        <li data-tab="tab-man">Brands</li>
                    </ul>
                    <div id="tab-prod" class="search-results" style="display: block;"></div>
                    <div id="tab-cat" class="search-results" style="display: none;"></div>
                    <div id="tab-man" class="search-results" style="display: none;"></div>
                </div>
                </div>
                <button type="submit" class="material-icons">search</button>
            </form>
            </div>
            <div class="ht-item q-actions">
                <a href="{{ url('/') }}" class="ac cmpr-toggler">
                    <div class="ac cmpr-toggler h-desk">
                        <div class="ic"><i class="material-icons">home</i></div>
                        <div class="ac-content">
                            <h5 class="text">Home</h5>
                        </div>
                    </div>
                </a>
                <a href="{{ route('cart') }}" class="ac h-offer-icon">
                    <div class="ic"><i class="material-icons" style="color: #fff;">shopping_basket</i></div>
                    <div class="ac-content">
                        <p style="background-color: #01ff70;
                         text-align: center; color: #fff; border-radius: 2px; padding: 0px 6px 0px 6px;">{{ Cart::count() }} ITEMS</p>
                        <h5>&nbsp;&nbsp;CART&nbsp;&nbsp;</h5>
                    </div>
                </a>
                <a href="{{ url('account/wishlist') }}" class="ac h-offer-icon">
                    <div class="ic"><i class="fa fa-heart" style="color: #fff;"></i></div>
                    <div class="ac-content">
                        @php
                            $wishid = Auth::id(); 
                            $wishcount =  DB::table('wishlists')->where('user_id',$wishid)->count();
                            
                        @endphp

                        <p style="background-color: #01ff70;
                         text-align: center; color: #fff; border-radius: 2px;">{{$wishcount}} ITEMS</p>
                        <h5>&nbsp;Wishlist&nbsp;</h5>
                    </div>
                </a>
                <a href="{{ url('pc_builder') }}" class="ac h-desk build-pc">
                    <div class="ic"><i class="material-icons">important_devices</i></div>
                    <div class="ac-content">
                        <h5 class="text">PC Builder</h5>
                    </div>
                </a>
                <div class="ac">
                    <a class="ic" href="{{ url('/home') }}">
                        <i class="material-icons" style="color: #fff;">person</i>
                    </a>
                    <div class="ac-content">
                        <a href="{{ url('/home') }}">
                            <h5>&nbsp;&nbsp;Account&nbsp;&nbsp;</h5>
                        </a> 
                        <p>
                            <a href="{{ route('register') }}">Register</a>
                            Or
                            @guest
                                <a href="{{ route('login') }}">Login</a>
                            @else
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display: inline-block;">
                                 @csrf
                            </form>
                            @endguest
                        </p>
                    </div>
                </div>
                <div class="ac build-pc m-hide">
                    <a class="btn" href="{{ url('pc_builder') }}">PC Builder</a>
                </div>
            </div>
        </div>
    </div>

<!--  top  navbar End -->



<!--   navbar Start -->
    <nav class="navbar" id="main-nav">
    <div class="container">
        <ul class="navbar-nav">
        @php 
            $categorys = App\Models\Category::where('status',1)->get();
        @endphp
        @foreach($categorys as $key=>$category)
            <li class="nav-item has-child c-1" style="padding-left: 1%;">
                <a class="nav-link" href="{{ url('accessories/products/'.$category->slug
                ) }}">{{ $category->cat_name }}</a>
                <ul class="drop-down drop-menu-1">
                    @php
                        $cat_id = $category->id;
                        $Subcategorys = App\Models\Subcategory::where('cat_id',$cat_id )->where('status',1)->get();
                    @endphp
                    @foreach($Subcategorys as $key=>$Subcategory)
                    @php
                        $id1=$Subcategory->id;
                        $check = App\Models\Brand::where('sub_cat_id',$id1 )->where('status',1)->first();
                    @endphp
                    @if($check)
                    <li class="nav-item has-child" >
                    @else
                    <li class="nav-item" >
                    @endif
                        <a class="nav-link" href="{{ url('products/'.$category->cat_name."/".$Subcategory->slug) }}">
                            {{ $Subcategory->sub_cat_name }}
                        </a>
                        <ul class="drop-down drop-menu-2">
                            @php
                                $id1=$Subcategory->id;
                                $Brands = App\Models\Brand::where('sub_cat_id',$id1 )->where('status',1)->get();
                            @endphp
                            @foreach($Brands as $key=>$Brand)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('products/'.$category->cat_name."/".$Subcategory->sub_cat_name."/".$Brand->slug) }}">
                                    {{ $Brand->brand_name }}
                                </a>
                                <form id="{{ "br_".$Brand->id }}" action="{{ url('products/'.$category->cat_name."/".$Subcategory->sub_cat_name."/".$Brand->brand_name) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $Brand->id }}">
                                </form>
                            </li>
                             @endforeach
                        </ul>
                       
                    </li>
                   @endforeach 
                   <li class="nav-item">
                        <a class="nav-link" href="{{ url('accessories/products/'.$category->slug
                ) }}">Show All {{ $category->cat_name }}</a>
                    </li> 
                </ul>
            </li>
        @endforeach

           {{--  <li class="nav-item has-child c-2"> --}}
        </ul>
    </div>

</nav>
<!--   navbar End -->
</header>


<div class="f-btn mc-toggler" id="cart">
    <i class="material-icons">shopping_basket</i>
    <div class="label">Cart</div>
    <span class="counter">{{ Cart::count(); }}</span>
</div>

<div class="drawer m-cart" id="m-cart">
    <div class="title">
        <p>YOUR CART</p>
        <span class="mc-toggler"><i class="material-icons">close</i></span>
    </div>
    <div class="content" style="margin-top: 0px;">
         @if(Cart::count()==0)
            <div class="empty-content">
            <p class="text-center">Your shopping cart is empty!</p>
        </div>
        @endif
        @foreach(Cart::content() as $rows)
        <div class="item">
            <div class="image">
                <img src="{{ URL::to($rows->options->images) }}" alt="{{$rows->name}}" width="47" height="47">
            </div>
            <div class="info">
                <div class="name">{{$rows->name}}</div>
                <span class="amount">{{$rows->price}} ৳</span>
                <i class="material-icons">clear</i>
                <span>{{$rows->qty}}</span>
                <span class="eq">=</span>
                <span class="total">{{ $rows->total }} ৳</span>
            </div>
            <div class="remove" onclick="event.preventDefault();document.getElementById('{{ $rows->rowId }}').submit();" title="Remove">
                <i class="material-icons" aria-hidden="true">delete</i>
                <form id="{{ $rows->rowId }}" method="POST" action="{{url('/delete-to-cart/'.$rows->rowId)}}">
                    @csrf
                </form>
            </div>
        </div>
        @endforeach
        </div>
    <div class="footer"></div>
</div>

<div class="drawer m-cart" id="m-cart">
    <div class="title">
        <p>YOUR CART</p>
        <span class="mc-toggler loaded close"><i class="material-icons">close</i></span>
    </div>
    <div class="content" style="margin-top: 0px;">
        @if(Cart::count()==0)
            <div class="empty-content">
            <p class="text-center">Your shopping cart is empty!</p>
        </div>
        @endif
        @foreach(Cart::content() as $rows)
        <div class="item">
            <div class="image">
                <img src="{{ URL::to($rows->options->images) }}" alt="{{$rows->name}}" width="47" height="47">
            </div>
            <div class="info">
                <div class="name">{{$rows->name}}</div>
                <span class="amount">{{$rows->price}} ৳</span>
                <i class="material-icons">clear</i>
                <span>{{$rows->qty}}</span>
                <span class="eq">=</span>
                <span class="total">{{ $rows->total }} ৳</span>
            </div>
            <div class="remove" onclick="event.preventDefault();document.getElementById('{{ $rows->rowId }}').submit();" title="Remove">
                <i class="material-icons" aria-hidden="true">delete</i>
                <form id="{{ $rows->rowId }}" method="POST" action="{{url('/delete-to-cart/'.$rows->rowId)}}">
                    @csrf
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="footer" style="background-color: #fff;">
        <div class="promotion-code">
            <div class="input-group">
                <input type="text" placeholder="Promo Code" id="input-cart-coupon">
                <span class="input-group-btn"><button data-target="#input-cart-coupon" class="btn button-coupon" type="submit">Apply</button></span>
            </div>
        </div>
                <div class="total">
            <div class="title">Sub-Total</div>
            <div class="amount">{{ number_format((float)(Cart::subtotal()), 2) }} ৳</div>
        </div>
        @if(Cart::count()>0)
        <div class="total">
            <div class="title">Home Delivery</div>
            <div class="amount">100৳</div>
        </div>
        @endif
        @if(Cart::count()>0)
        <div class="total">
            <div class="title">Total</div>
            <div class="amount">{{ number_format((float)(Cart::total() + 100), 2) }}৳</div>
        </div>
        @else
        <div class="total">
            <div class="title">Total</div>
            <div class="amount">{{ number_format((float)(Cart::total()), 2) }}৳</div>
        </div>
        @endif
         @if(Cart::count()>0)
        <div class="checkout-btn">
            <a href="{{ url('checkout') }}"><button class="btn submit">Checkout</button></a>
        </div>
        @endif
    </div>
</div>

<!--Start main section -->

@yield('content')



<footer class="footer">
     <div class="container" style="padding-bottom: 25px;">
        <div class="row">
            <div class="footer-col">
                <h4>Company</h4>
                <p style="color: #bbbbbb;"> Shop No-606, Rajuk Commercial Complex, Azampur Uttara, Dhaka, 1230
                <br>
                Email: info@rootfive.com.bd </p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d228.03820650449032!2d90.39974514748415!3d23.867932502736902!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfdb6c62e076d0011!2sRootfive%20Bangladesh!5e0!3m2!1sbn!2sbd!4v1634754155354!5m2!1sbn!2sbd"  width="100%" height="100" style="border:0; border-radius:5px;" allowfullscreen="" loading="lazy"></iframe>      
            </div>
            <div class="footer-col">
                <h4>get help</h4>
                <ul>
                    <li><a href="{{ url('about-us') }}">About Us</a></li>
                    <li><a href="{{ url('terms-and-conditions') }}"> Terms and Conditions</a></li>
                    <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('contact-us') }}"> Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Menu</h4>
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{ route('cart') }}">Cart</a></li>
                    <li><a href="{{ url('account/wishlist') }}">Wishlist</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
                <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="cm0YZwob"></script>

        <div class="fb-page" data-href="https://www.facebook.com/ROOTFIVEBD/" data-tabs="timeline" data-width="450" data-height="150" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ROOTFIVEBD/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ROOTFIVEBD/">Rootfive bangladesh</a></blockquote></div>
            </div>
            </div>
        </div>

    </div>
     </div>
     <div class="container">
        <hr>
     <div class="row sub-footer">
            <div class="col-md-6 copyright-info">
                <p>© 2021 RootFive Bangladesh | All rights reserved</p>
            </div>
            <div class="col-md-6 powered-by">
                <p>Powered By: <a href="" target="_blank" style="color:#01ff70;">RooTFive Bangladesh</a> </p>
            </div>
        </div>
    </div>
  </footer>

</body>
</html>