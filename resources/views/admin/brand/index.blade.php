@extends('layouts.admin_layouts')
@section('content')
<!-- [ Main Content ] start -->
<div class="row">
<div class="col-md-8">
 <div class="row">
        <!-- customar project  start -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                    </div>
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Sub Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $key=>$value)
                               <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->subcategory->sub_cat_name  }}</td>
                                    <td>{{ $value->brand_name }}</td>
                                    <td>
                                        @if($value->status==1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">UnActive</span>
                                        @endif
                                    </td>
                                    @if($eidt==010)
                                    <td>
                                        <form style="display: inline-block;" action="{{ url('eidt/brand') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp; </button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        @if($value->status==1)
                                        <a href="{{url('unactive/brand/'.$value->id) }}" class="btn btn-danger btn-sm"><i class="feather icon-thumbs-down"></i>&nbsp; </a>
                                        @else
                                        <a href="{{url('active/brand/'.$value->id) }}" class="btn btn-success btn-sm"><i class="feather icon-thumbs-up"></i>&nbsp; </a>
                                        @endif
                                        <form style="display: inline-block;" action="{{ url('eidt/brand') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp; </button>
                                        </form>
                                        <a href="{{ url('delete/brand/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="feather icon-trash-2"></i>&nbsp;</a>
                                    </td>
                                    @endif
                                </tr>
                              @endforeach
 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- customar project  end -->
    </div>   
</div>
<div class="col-md-4">
@if($eidt==010)
    <form method="post" action="{{ url('upadate/brand') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $Brand->id }}">
    <div class="card">
        <div class="card-body">
            <h5>Eidt Brand</h5>
            <hr>
            <div class="row">
        <div class="col-sm-12">
             <div class="form-group">
                {{-- <label class="floating-label" for="cat_name">Category</label> --}}
                <select name="sub_cat_id"class="form-control  @error('sub_cat_id') is-invalid @enderror">
                    <option value="">Select One.....</option>
                    @php
                    $cat=App\Models\Subcategory::where('status',1)->get();
                    @endphp
                    @foreach($cat as $row)
                    <option value="{{ $row->id }}" {{$row->id == $Brand->sub_cat_id ? "selected":"" }}>{{ $row->sub_cat_name }}</option>
                    @endforeach
                </select>
                @error('sub_cat_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="floating-label" for="brand_name">Brand Name</label>
                <input type="text" name="brand_name" class="form-control  @error('brand_name') is-invalid @enderror" id="brand_name" value="{{ $Brand->brand_name }}">
                @error('brand_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit"  class="btn btn-primary">UPDATE</button>
            <a href="{{ route('brand') }}" class="btn btn-outline-secondary" >Back</a>
        </div>
    </div>
        </div>
    </div>
    </form>
@else
<form method="post" action="{{ url('store/brand') }}">
        @csrf
    <div class="card">
        <div class="card-body">
            <h5>Add Brand</h5>
            <hr>
            <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{-- <label class="floating-label" for="cat_name">Category</label> --}}
                <select id="category" name="category"class="form-control  @error('category') is-invalid @enderror">
                    <option value="">--------Select Catgory One------</option>
                    @php
                    $cat=App\Models\Category::where('status',1)->get();
                    @endphp
                    @foreach($cat as $row)
                    <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group">
                {{-- <label class="floating-label" for="cat_name">Category</label> --}}
                <select id="sub_category" name="sub_cat_id"class="form-control  @error('sub_cat_id') is-invalid @enderror">
                    <option value="">Select One.....</option>
                </select>
                @error('sub_cat_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="floating-label" for="brand_name">Brand Name</label>
                <input type="text" name="brand_name" class="form-control  @error('brand_name') is-invalid @enderror" id="brand_name" placeholder="" autocomplete="off">
                @error('brand_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit"  class="btn btn-primary">Submit</button>
            <button class="btn btn-danger" type="reset">Clear</button>
        </div>
    </div>
        </div>
    </div>
    </form>
@endif

</div>
 
</div>            
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function () {
$('#category').on('change',function(e) {
var cat_id = this.value;
$.ajax({
    type: "POST",
    data:{
          cat_id : cat_id,
          _token: '{{ csrf_token() }}'
        },
                url: "{{ route('subcat') }}",
                success:function(response){
                      var data =""
                      data = data + "<option value="+0+">"+"--------Select One-------"+"</option>"
                    $.each(response.data , function(key, value){
                      
                        data = data + "<option value="+value.id+">"+value.sub_cat_name+"</option>"
                     
                       
                    })

                    $('#sub_category').html(data);

                    
                }
                
            })

});

});




</script>
@endsection