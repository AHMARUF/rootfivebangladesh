@extends('layouts.layout')
@section('content')
{{-- {{ header("Refresh:1"); }} --}}

<section class="build-your-pc shortscent">
    <div class="container" >
        <div class="pcb-container">
            @if(Session::has('Pc_save_m'))
            <div class="alert alert-warning">
                <strong>Warning! </strong> {{ Session::get('Pc_save_m') }}
                <button type="button" class="close material-icons" data-dismiss="alert">×</button>
            </div>
            @endif
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
                        <a class="action" href="{{ url('account/save_pc') }}">
                            <i class="material-icons">save</i>
                            <span class="action-text">Save PC</span>
                        </a>
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
                     @php
                                $CPU_price=Session::get('CPU_price');
                                $CPU_Cooler_price=Session::get('CPU_Cooler_price');
                                $Mother_Board_price=Session::get('Mother_Board_price');
                                $RAM_price=Session::get('RAM_price');
                                $RAM_2_price=Session::get('RAM_2_price');
                                $Storage_price=Session::get('Storage_price');
                                $Storage_2_price=Session::get('Storage_2_price');
                                $Graphics_Card_price=Session::get('Graphics_Card_price');
                                $Power_Supply_price=Session::get('Power_Supply_price');
                                $Casing_price=Session::get('Casing_price');
                                $Casing_Cooler_price=Session::get('Casing_Cooler_price');
                                $Monitor_price=Session::get('Monitor_price');
                                $Keyboard_price=Session::get('Keyboard_price');
                                $Mouse_price=Session::get('Mouse_price');
                                $Headphone_price=Session::get('Headphone_price');
                                $Anti_Virus_price=Session::get('Anti_Virus_price');
                                $UPS_price=Session::get('UPS_price');

                                $total_tK=$CPU_price+$CPU_Cooler_price+$Mother_Board_price+$RAM_price+$RAM_2_price+$Storage_price+$Storage_2_price+$Graphics_Card_price+$Power_Supply_price+$Casing_price+$Casing_Cooler_price+$Monitor_price+$Keyboard_price+$Mouse_price+$Headphone_price+$Anti_Virus_price+$UPS_price;

                                $CPU_item=Session::get('CPU_item');
                                $CPU_Cooler_item=Session::get('CPU_Cooler_item');
                                $Mother_Board_item=Session::get('Mother_Board_item');
                                $RAM_item=Session::get('RAM_item');
                                $RAM_2_item=Session::get('RAM_2_item');
                                $Storage_item=Session::get('Storage_item');
                                $Storage_2_item=Session::get('Storage_2_item');
                                $Graphics_Card_item=Session::get('Graphics_Card_item');
                                $Power_Supply_item=Session::get('Power_Supply_item');
                                $Casing_item=Session::get('Casing_item');
                                $Casing_Cooler_item=Session::get('Casing_Cooler_item');
                                $Monitor_item=Session::get('Monitor_item');
                                $Keyboard_item=Session::get('Keyboard_item');
                                $Mouse_item=Session::get('Mouse_item');
                                $Headphone_item=Session::get('Headphone_item');
                                $Anti_Virus_item=Session::get('Anti_Virus_item');
                                $UPS_item=Session::get('UPS_item');


                                $total_item = $CPU_item+$CPU_Cooler_item+$Mother_Board_item+$RAM_item+$RAM_2_item+$Storage_item+$Storage_2_item+$Graphics_Card_item+$Power_Supply_item+$Casing_item+$Casing_Cooler_item+$Monitor_item+$Keyboard_item+$Mouse_item+$Headphone_item+$Anti_Virus_item+$UPS_item;
                            @endphp
                    <div class="right">
                        <div class="total-amount">
                            <span class="amount">{{ $total_tK }} ৳</span>
                            <input type="hidden" name="total_tK" value="{{ $total_tK }}">
                            <input type="hidden" name="total_item" value="{{$total_item}}">
                            <span class="items">{{$total_item}} Items</span>
                        </div>
                    </div>
                </div>

                <div class="pcb-content">
                    <div class="content-label">Core Components</div>
                    @php
                      
                      $CPU_id=Session::get('CPU_id');
                    @endphp
                    @if($CPU_id)
                    @php
                    $CPU=Session::get('CPU');
                    $data_2 = App\Models\Product::where('status',1)->where('id',$CPU)->first();
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 2;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="item-price">
                        </div>
                        <div class="actions">
                        	@php
                        	$id= 2;
                        	@endphp
                            <a class="btn st-outline" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div> 
                    @endif

                    @php
                        $CPU_Cooler_id=Session::get('CPU_Cooler_id');
                    @endphp
                    @if($CPU_Cooler_id)
                    @php
                        $CPU_Cooler=Session::get('CPU_Cooler');
                        $data_2 = App\Models\Product::orderBy('id', 'desc')->where('status',1)->where('id',$CPU_Cooler)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ 
                            url('product/deatils/'.$data_2->product_slug) }}">
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 3;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 3;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Mother_Board_id=Session::get('Mother_Board_id');
                    @endphp
                    @if($Mother_Board_id)
                    @php
                        $Mother_Board=Session::get('Mother_Board');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 4;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 4;
                        	@endphp
                            <a class="btn st-outline" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $RAM_id=Session::get('RAM_id');
                    @endphp
                    @if($RAM_id)
                    @php
                        $RAM=Session::get('RAM');
                        $data_2 = App\Models\Product::where('status',1)->where('id',$RAM)->first();
                    @endphp
                    <div class="c-item selected">
                        <div class="img">
                            <a target="_blank" href="{{ url('product/deatils/'.$data_2->product_slug) }}">
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 5;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 5;
                        	@endphp
                            <a class="btn st-outline" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $RAM_2_id=Session::get('RAM_2_id');
                    @endphp
                    @if($RAM_2_id)
                    @php
                        $RAM_2=Session::get('RAM_2');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 52;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 52;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif



                    @php
                        $Storage_id=Session::get('Storage_id');
                    @endphp
                    @if($Storage_id)
                    @php
                        $Storage=Session::get('Storage');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 6;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 6;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Storage_2_id=Session::get('Storage_2_id');
                    @endphp
                    @if($Storage_2_id)
                    @php
                        $Storage_2=Session::get('Storage_2');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 62;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 62;
                        	@endphp
                            <a class="btn st-outline" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Graphics_Card_id=Session::get('Graphics_Card_id');
                    @endphp
                    @if($Graphics_Card_id)
                    @php
                        $Graphics_Card=Session::get('Graphics_Card');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 7;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 7;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Power_Supply_id=Session::get('Power_Supply_id');
                    @endphp
                    @if($Power_Supply_id)
                    @php
                        $Power_Supply=Session::get('Power_Supply');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 8;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 8;
                        	@endphp
                            <a class="btn st-outline" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Casing_id=Session::get('Casing_id');
                    @endphp
                    @if($Casing_id)
                    @php
                        $Casing=Session::get('Casing');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 9;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 9;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif





                    <div class="content-label">Peripherals &amp; Others</div>



                    @php
                        $Casing_Cooler_id=Session::get('Casing_Cooler_id');
                    @endphp
                    @if($Casing_Cooler_id)
                    @php
                        $Casing_Cooler=Session::get('Casing_Cooler');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 10;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 10;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Monitor_id=Session::get('Monitor_id');
                    @endphp
                    @if($Monitor_id)
                    @php
                        $Monitor=Session::get('Monitor');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 11;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 11;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Keyboard_id=Session::get('Keyboard_id');
                    @endphp
                    @if($Keyboard_id)
                    @php
                        $Keyboard=Session::get('Keyboard');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 12;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 12;
                        	@endphp
                            <a class="btn st-outline" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Mouse_id=Session::get('Mouse_id');
                    @endphp
                    @if($Mouse_id)
                    @php
                        $Mouse=Session::get('Mouse');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 13;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 13;
                        	@endphp
                            <a class="btn st-outline" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Headphone_id=Session::get('Headphone_id');
                    @endphp
                    @if($Headphone_id)
                    @php
                        $Headphone=Session::get('Headphone');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 14;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 14;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $Anti_Virus_id=Session::get('Anti_Virus_id');
                    @endphp
                    @if($Anti_Virus_id)
                    @php
                        $Anti_Virus=Session::get('Anti_Virus');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 15;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 15;
                        	@endphp
                            <a class="btn st-outline" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
                        </div>
                    </div>
                    @endif




                    @php
                        $UPS_id=Session::get('UPS_id');
                    @endphp
                    @if($UPS_id)
                    @php
                        $UPS=Session::get('UPS');
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
                        <div class="actions">
                            <div class="action-items">
                                @php
                                    $id= 16;
                                @endphp
                                <a class="action" href="{{ url('pc_builder/flash/'.$id) }}" title="Remove"><i class="material-icons">clear</i></a>
                                <a class="action" href="{{ url('pc_builder/choose/component_id='.$id) }}" title="Choose"><i class="material-icons">autorenew</i></a>
                            </div>
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
                        <div class="actions">
                        	@php
                        	$id= 16;
                        	@endphp
                            <a class="btn st-outline" href="{{url ('pc_builder/choose/component_id='.$id) }}" title="">Choose</a>
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