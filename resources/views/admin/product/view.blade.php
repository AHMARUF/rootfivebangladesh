@extends('layouts.admin_layouts')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ URL::to($data->image) }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h4>{{ $data->product_Name }}</h4>
                <div>
                    @php echo $data->Key_Features @endphp
                </div>
                <div class=" col-md-12">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped" >
                                <tbody>
                                    <tr>
                                        <th>Price</th>
                                        <th>$ {{ $data->Price }}</th>
                                        <th>Regular Price</th>
                                        <th>$ {{ $data->Regular_Price }}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>{{ $data->product_code }}</th>
                                        <th>Category</th>
                                        <th>{{ $data->category->cat_name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Sub Category</th>
                                        <th>{{ $data->Subcategory->sub_cat_name }}</th>
                                        <th>Brand</th>
                                        @if($data->brand_id ==!null)
                                        <th>{{ $data->brand->brand_name }}</th>
                                        @else
                                        <th> Not Brand</th>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Quantity</th>
                                        <th>{{ $data->quantity }}</th>
                                        <th>PC Builder</th>
                                        @if($data->PC_builder ==!null)
                                        <th>
                                            @if($data->PC_builder==1)
                                                Builder PC
                                            @elseif($data->PC_builder==2)
                                                CPU
                                            @elseif($data->PC_builder==3)
                                                CPU Cooler
                                            @elseif($data->PC_builder==4)
                                                Mother Board
                                            @elseif($data->PC_builder==5)
                                                RAM
                                            @elseif($data->PC_builder==6)
                                                Storage
                                            @elseif($data->PC_builder==7)
                                                Graphics Card
                                            @elseif($data->PC_builder==8)
                                                Power Supply
                                            @elseif($data->PC_builder==9)
                                                Casing
                                            @elseif($data->PC_builder==10)
                                                Casing Cooler
                                            @elseif($data->PC_builder==11)
                                                Monitor
                                            @elseif($data->PC_builder==12)
                                                Keyboard
                                            @elseif($data->PC_builder==13)
                                                Mouse
                                            @elseif($data->PC_builder==14)
                                                Headphone
                                            @elseif($data->PC_builder==15)
                                                Anti Virus
                                            @elseif($data->PC_builder==16)
                                                UPS
                                            @endif
                                        </th>
                                        @else
                                        <th>NOT</th>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>  
            </div>
            <div class="col-md-12">
                @php echo $data->Specification @endphp
                <hr>
            </div>

            <div class="col-md-12">
                @php echo $data->Description @endphp
                <hr>
            </div>
            <div class="col-md-12">
                <a href="{{ route('product') }}" class="btn btn-primary"><i class="feather icon-chevron-left"></i>Back</a>
                 <form style="display: inline-block;" action="{{ url('eidt/product') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-info"><i class="feather icon-edit"></i>Eidt</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection  