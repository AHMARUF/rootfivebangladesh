@extends('layouts.layout')
@section('content')
@php
  function pc_builder($value){
  $values=[
    1=>'null',
    2=>'CPU',
    3=>'CPU Cooler',
    4=>'Mother Board',
    5=>'RAM',
    52=>'RAM 2',
    6=>'Storage',
    62=>'Storage',
    7=>'Graphics Card',
    8=>'Power Supply',
    9=>'Casing',
    10=>'Casing Cooler',
    11=>'Monitor',
    12=>'Keyboard',
    13=>'Mouse',
    14=>'Headphone',
    15=>'Anti Virus',
    16=>'UPS',
  ];
  return $values[$value];
}

@endphp
<section class="p-item-page bg-bt-gray p-tb-15">
    <div class="container body">
        <div class="row pc-builder-choose-content">
            <div id="content" class="col-xs-12 col-md-12">
                <div class="top-bar ws-box">
                    <div class="row">
                        <div class="col-sm-4 col-xs-2 actions">
                            <a class="tool-btn" href="{{ url('pc_builder') }}">
                                <i class="material-icons">arrow_back</i>
                            </a>
                            <button class="tool-btn" id="lc-toggle"><i class="material-icons">filter_list</i> Filter</button>
                            <form method="get" action="{{ url('search='.$id) }}" >
                            <div class="search pcb-search m-hide">
                                <input type="text" name="search" placeholder="Search" class="form-control input-lg" autocomplete="off">
                                <button style="border: none;" type="submit">
                                    <i class="material-icons" id="button-search">search</i>
                                </button>
                                
                            </div> 
                        </form>
                        </div>
                       <div class="col-sm-8 col-xs-10 show-sort">
                            <div class="form-group">
                               <h5 style="padding-right: 20px;">{{pc_builder($id)}}</h5>
                                {{-- <div class="custom-select">
                                    <select id="input-sort">
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">

                    @foreach($data as $rows)
                    <div class="product-thumb ws-box">
                        <div class="img-holder">
                            <a href="{{ url('product/deatils/'.$rows->product_slug) }}">
                                <img src="{{ URL::to($rows->image) }}" alt="{{ $rows->product_Name }}" height="228px" width="228px">
                            </a>
                        </div>
                        <div class="product-info">
                            <div class="product-content-blcok">
                                <h4 class="product-name">
                                    <a href="{{ url('product/deatils/'.$rows->product_slug) }}">{{ $rows->product_Name }}</a>
                                </h4>
                                <div class="short-description">
                                 	@php
                                        echo $rows->Key_Features;
                                    @endphp
                                </div>
                            </div>
                            <div class="actions">
                                <div class="price space-between">
                                    <span class="price">{{ $rows->Price }} ৳</span>
                                    @if(52==$id)
                                    <a class="btn-add btn" href="{{ url('pc_builder/choose/'.$rows->id.'/'."52") }}">Add</a>
                                    @elseif(62==$id)
                                    <a class="btn-add btn" href="{{ url('pc_builder/choose/'.$rows->id.'/'."62") }}">Add</a>
                                    @else
                                    <a class="btn-add btn" href="{{ url('pc_builder/choose/'.$rows->id.'/'.$rows->PC_builder) }}">Add</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
    			</div>




    <div class="row pagination-row">
        {{ $data3->onEachSide(0)->links('paginte') }} 
    </div>



    </div>
  </div>
    </div>
</section>



@endsection