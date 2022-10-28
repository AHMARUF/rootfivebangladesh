@extends('layouts.layout')
@section('content')
{{-- <script async src="{{asset ('public/asset/asset/js/operator.js')}}" type="text/javascript"></script> --}}
<script async src="{{asset ('public/asset/asset/js/product.js')}}" type="text/javascript"></script>

    <div class="product-details content" itemscope itemtype="http://schema.org/Product">
        <meta itemprop="sku" content="10218">
        <div class="product-details-summary">
            <div class="container">
                <div class="basic row">
                    <div class="col-md-5 left">
                        <div class="images product-images">
                            <div class="product-img-holder">
                                <a class="thumbnail" href="{{ URL::to($data->image) }}" title="{{ $data->product_Name }}">
                                    <img class="main-img" src="{{ URL::to($data->image) }}" alt="{{ $data->product_Name }}"/>
                                </a>
                                <meta itemprop="image" content="https://www.startech.com.bd/image/cache/catalog/desktop-pc/asus/pn40/pn40-500x500.jpg" />
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-7 right" id="product">
                        <div class="pd-summary">
                            <div class="product-short-info">
                                <h1 itemprop="name" class="product-name">{{ $data->product_Name }}</h1>
                                <table class="product-info-table">
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Regular Price</td>
                                        <td class="product-info-data product-regular-price"><del>{{ number_format((float)($data->Regular_Price), 2) }}৳</del></td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Price</td>
                                        <td class="product-info-data product-price">{{ number_format((float)($data->Price), 2) }}৳</td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Status</td>
                                        @if($data->quantity == 0)
                                        <td style="color: red;" class="product-info-data product-status">Out of Stock</td>
                                        @else
                                        <td  class="product-info-data product-status ">In Stock</td>
                                        @endif
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Product Code</td>
                                        <td class="product-info-data product-code">{{ $data->product_code }}</td>
                                    </tr>
                                    <tr class="product-info-group" itemprop="brand" itemtype="http://schema.org/Thing" itemscope>
                                        <td class="product-info-label">Brand</td>
                                        @if($data->brand_id ==!null)
                                        <td class="product-info-data product-brand" itemprop="name">{{ $data->brand->brand_name }}</td>
                                        @else
                                        <td class="product-info-data product-brand" itemprop="name">Not Brand</td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                            <div class="short-description" >
                                <h2>Key Features</h2>
                                <ul>
                                    @php
                                        echo $data->Key_Features;
                                    @endphp
                                    <li class="view-more" data-area="specification">View More Info</li>
                                </ul>
                            </div>
                            <form method="POST" action="{{ url('add-to-cart') }}">
                                @csrf
                            <div class="cart-option">
                                @if($data->quantity>0)
                                <label class="quantity">
                                <span class="ctl"><i class="material-icons">remove</i></span>
                                <span class="qty"><input type="text" name="quantity" id="input-quantity" value="1" size="2"></span>
                                <span  class="ctl increment"><i class="material-icons">add</i></span>
                                <input type="hidden" name="product_id" value="{{ $data->id }}" />
                            </label>
                                <button type="submit" class="btn submit-btn" data-loading-text="Loading...">Buy Now</button>
                                @else
                                <span class="stock-status">Out Of Stock</span>
                                @endif
                            </div>
                        </form>
                        </div>

                    </div>
                    <div itemprop="aggregateRating" itemscope itemtype="">
                        <meta itemprop="ratingValue" content="5" />
                        <meta itemprop="reviewCount" content="1" />
                    </div>
                </div>
                <div class="navs">
                    <ul>@if($data->Specification ==!null)
                        <li data-area="specification">Specification</li>
                        @endif
                        @if($data->Description ==!null)
                        <li data-area="description">Description</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="pd-full">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        @if($data->Specification ==!null)
                        <section class="specification-tab m-tb-10" id="specification">
                                @php
                                    echo $data->Specification;
                                @endphp
                        </section>
                        @endif
                        @if($data->Description ==!null)
                        <section class="description bg-white m-tb-15" id="description">
                            <div class="section-head">
                                <h2>Description</h2>
                            </div>
                            <div class="full-description" itemprop="description">
                                @php
                                    echo $data->Description;
                                @endphp
                            </div>
                        </section>
                        @endif
                    </div>
                    <div class="col-lg-3 col-md-12 c-left">
                        <section class="related-product-list">
                            <h3>Related Product</h3>
                            @foreach($Related as $rows)
                            <div class="p-s-item">
                                <div class="image-holder">
                                    <a href="{{ url('product/deatils/'.$rows->product_slug) }}"><img src="{{ URL::to($rows->image) }}" alt="{{ $rows->product_slug }}" width="80" height="80"></a>
                                </div>
                                <div class="caption">
                                    <h4 class="product-name">
                                        <a href="{{ url('product/deatils/'.$rows->product_slug) }}">{{ $rows->product_Name }}</a>
                                    </h4>
                                    <div class="p-item-price price">
                                        <span>{{ number_format((float)($rows->Price ), 2) }}৳</span> </div>
                                </div>
                            </div>
                            @endforeach
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection