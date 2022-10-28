@extends('layouts.layout')
@section('content')
{{-- {{ header("Refresh:3"); }}  --}}

@php
$data = App\Models\Pc_save::where('pc_id',$id)->first();
@endphp

<section class="build-your-pc shortscent">
    <div class="container" >
        <div class="pcb-container">
            <div class="pcb-head">
                <div class="startech-logo">
                    <img class="logo" src="{{ asset('public/asset/asset/img/logo.png') }}" alt="Logo">
                </div>
                <div class="actions">
                    <div class="all-actions">
                        <a class="action" href="{{ url('pc_builder/add_to_cart') }}">
                            <i class="material-icons">shopping_basket</i>
                            <span class="action-text">Add to Cart</span>
                        </a>
                        {{-- <a class="action" href="{{ url('account/save_pc') }}">
                            <i class="material-icons">save</i>
                            <span class="action-text">Save PC</span>
                        </a>--}}  
                        <a class="action m-hide" href="{{ url('pc_builder/print_pc') }}">
                            <i class="material-icons">print</i>
                            <span class="action-text">Print</span>
                        </a>
                        <form  method="" target="_blank"  id="form-base64-image">
                            <a  href="" name="image" id="input-base64-image" class="action" download="Rootfive_Bangladesh.png">
                                <i class="material-icons">camera</i>
                                <span class="action-text">Screenshot</span>
                            </a>
                        </form>
                         <a class="pcb-button btn" href="{{ url('pc_builder/quote') }}">Get a Quote</a>
                    </div>
                </div>
            </div>


            <div class="pcb-inner-content">
                <div class="pcb-top-content">
                    <div class="left">
                        <h5 class="m-hide">PC Builder - Build Your Own Computer - RootFive Bangladesh</h5>
                        <div class="checkbox-inline">
                            <input type="checkbox" name="hide" id="input-hide">
                            <label for="input-hide">Hide Unconfigured Components</label>
                        </div>
                    </div>
                    <div class="right">
                        <div class="total-amount">
                            <span class="amount">{{ $data->total_tK }}৳</span>
                            <span class="items">{{ $data->total_item }} Items</span>
                        </div>
                    </div>
                </div>

                <div class="pcb-content">
                    <div class="content-label">Core Components</div>
                    @if($data->CPU==!null)
                    @php
                    $CPU=$data->CPU;
                    $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$CPU)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>CPU</span><span class="mark">Required</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else

                   <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico cpu"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>CPU</span><span class="mark">Required</span></div>
                            <div class="product-name"></div>
                        </div>
                    </div> 
                    @endif

                    
                    @if($data->CPU_Cooler==!null)
                    @php
                        $CPU_Cooler=$data->CPU_Cooler;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$CPU_Cooler)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>CPU Cooler</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico cpu-cooler"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>CPU Cooler</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif


                    @if($data->Mother_Board==!null)
                    @php
                        $Mother_Board=$data->Mother_Board;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Mother_Board)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Mother Board</span><span class="mark">Required</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico mother-board"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Mother Board</span><span class="mark">Required</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif




                    @if($data->RAM==!null)
                    @php
                        $RAM=$data->RAM;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$RAM)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>RAM - 1</span><span class="mark">Required</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico ram---1"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>RAM - 1</span><span class="mark">Required</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif


                    @if($data->RAM_2==!null)
                    @php
                        $RAM_2=$data->RAM_2;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$RAM_2)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>RAM - 2</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico ram---2"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>RAM - 2</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif


                    @if($data->Storage==!null)
                    @php
                        $Storage=$data->Storage;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Storage)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Storage - 1</span><span class="mark">Required</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico storage---1"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Storage - 1</span><span class="mark">Required</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif


                    @if($data->Storage_2==!null)
                    @php
                        $Storage_2=$data->Storage_2;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Storage_2)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Storage  - 2</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico storage----2"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Storage  - 2</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif



                    @if($data->Graphics_Card==!null)
                    @php
                        $Graphics_Card=$data->Graphics_Card;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Graphics_Card)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Graphics Card</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico graphics-card"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Graphics Card</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif



                    @if($data->Power_Supply==!null)
                    @php
                        $Power_Supply=$data->Power_Supply;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Power_Supply)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Power Supply</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico power-supply"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Power Supply</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif



                    @if($data->Casing==!null)
                    @php
                        $Casing=$data->Casing;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Casing)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Casing</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico casing"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Casing</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif





                    <div class="content-label">Peripherals &amp; Others</div>


                    @if($data->Casing_Cooler==!null)
                    @php
                        $Casing_Cooler=$data->Casing_Cooler;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Casing_Cooler)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Casing Cooler</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico casing-cooler"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Casing Cooler</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif




                    @if($data->Monitor==!null)
                    @php
                        $Monitor=$data->Monitor;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Monitor)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Monitor</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico monitor"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Monitor</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif


                    @if($data->Keyboard==!null)
                    @php
                        $Keyboard=$data->Keyboard;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Keyboard)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Keyboard</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico keyboard"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Keyboard</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif


                    @if($data->Mouse==!null)
                    @php
                        $Mouse=$data->Mouse;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Mouse)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Mouse</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico mouse"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Mouse</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif




                    
                    @if($data->Headphone)
                    @php
                        $Headphone=$data->Headphone;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Headphone)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Headphone</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico headphone"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Headphone</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif




                   
                    @if($data->Anti_Virus==!null)
                    @php
                        $Anti_Virus=$data->Anti_Virus;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$Anti_Virus)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Anti Virus</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico anti-virus"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>Anti Virus</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif




                   
                    @if($data->UPS==!null)
                    @php
                        $UPS=$data->UPS;
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$UPS)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
                                <img src="{{ URL::to($data_2->image) }}" alt="CPU" title="CPU" width="80" height="80">
                            </a>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>UPS</span></div>
                            <div class="product-name">{{ $data_2->product_Name }}</div>
                        </div>
                        <div class="item-price">
                            <div class="price">{{ $data_2->Price }} ৳</div>
                        </div>
                    </div>
                    @else
                    <div class="c-item blank">
                        <div class="img">
                            <span class="img-ico ups"></span>
                        </div>
                        <div class="details">
                            <div class="component-name"><span>UPS</span></div>
                            <div class="product-name"></div>
                        </div>
                        <div class="item-price">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script async src="{{ asset('public/asset/asset/js//html2canvas.min.js') }}" type="text/javascript"></script> 


<script type="text/javascript">
    var image = document.getElementById("input-base64-image");
    function takeShot() {
        var region = document.querySelector(".pcb-container"), scrollTop = document.documentElement.scrollTop, config = {
            async: true,
        };
        if(scrollTop) {
            config.scrollY = -scrollTop
        }

        html2canvas(region, config).then(function(canvas) {
            var pngUrl = canvas.toDataURL();
            window.ca = canvas
            image.href = canvas.toDataURL("image/jpeg");
          

            /*let down = document.querySelector(".down");
            down.href = image.value.toDataURL();
            down.download="file.png";*/
        }).catch(function (reason) {
            console.log(reason)
        });
    }



    app.onReady(window, ["html2canvas"], function () {
       takeShot();
       $("#input-hide").on("change", function () {
           if(this.checked) {
               $(".c-item.blank").addClass("hide")
           } else {
               $(".c-item.blank").removeClass("hide")
           }
           image.value = "";
           setTimeout(takeShot, 500)
       })
    }, 30, 100);

    var form = document.getElementById("form-base64-image");
    form.onsubmit = function (ev) {
        var input = document.getElementById("input-base64-image");
        if(!input.value) {
            alert("Screenshot isn't prepared yet. Please clink again")
        }
        if(!input.value) {
            ev.preventDefault()
        }
    }

</script>

@endsection