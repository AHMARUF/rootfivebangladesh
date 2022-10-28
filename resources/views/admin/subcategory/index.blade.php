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
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $key=>$value)
                               <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->category->cat_name }}</td>
                                    <td>{{ $value->sub_cat_name }}</td>
                                    <td>
                                        @if($value->status==1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">UnActive</span>
                                        @endif
                                    </td>
                                    @if($eidt==010)
                                    <td>
                                        <form style="display: inline-block;" action="{{ url('eidt/Sub/category') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp; </button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        @if($value->status==1)
                                        <a href="{{url('unactive/Sub/category/'.$value->id) }}" class="btn btn-danger btn-sm"><i class="feather icon-thumbs-down"></i>&nbsp; </a>
                                        @else
                                        <a href="{{url('active/Sub/category/'.$value->id) }}" class="btn btn-success btn-sm"><i class="feather icon-thumbs-up"></i>&nbsp; </a>
                                        @endif
                                        <form style="display: inline-block;" action="{{ url('eidt/Sub/category') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp; </button>
                                        </form>
                                        <a href="{{ url('delete/Sub/category/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="feather icon-trash-2"></i>&nbsp;</a>
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
    <form method="post" action="{{ url('upadate/Sub/category') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $Subcategory->id }}">
    <div class="card">
        <div class="card-body">
            <h5>Eidt Sub-Category</h5>
            <hr>
            <div class="row">
        <div class="col-sm-12">
             <div class="form-group">
                {{-- <label class="floating-label" for="cat_name">Category</label> --}}
                <select name="cat_id"class="form-control  @error('cat_id') is-invalid @enderror">
                    <option value="">Select One.....</option>
                    @php
                    $cat=App\Models\Category::where('status',1)->get();
                    @endphp
                    @foreach($cat as $row)
                    <option value="{{ $row->id }}" {{$row->id == $Subcategory->cat_id ? "selected":"" }}>{{ $row->cat_name }}</option>
                    @endforeach
                </select>
                @error('cat_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="floating-label" for="sub_cat_name">Sub-Category</label>
                <input type="text" name="sub_cat_name" class="form-control  @error('sub_cat_name') is-invalid @enderror" id="sub_cat_name" value="{{ $Subcategory->sub_cat_name }}">
                @error('sub_cat_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit"  class="btn btn-primary">UPDATE</button>
            <a href="{{ route('Sub/category') }}" class="btn btn-outline-secondary" >Back</a>
        </div>
    </div>
        </div>
    </div>
    </form>
@else
<form method="post" action="{{ url('store/Sub/category') }}">
        @csrf
    <div class="card">
        <div class="card-body">
            <h5>Add Sub-Category</h5>
            <hr>
            <div class="row">
        <div class="col-sm-12">
             <div class="form-group">
                {{-- <label class="floating-label" for="cat_name">Category</label> --}}
                <select name="cat_id"class="form-control  @error('cat_id') is-invalid @enderror">
                    <option value="">Select One.....</option>
                    @php
                    $cat=App\Models\category::where('status',1)->get();
                    @endphp
                    @foreach($cat as $row)
                    <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                    @endforeach
                </select>
                @error('cat_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="floating-label" for="sub_cat_name">Sub-Category</label>
                <input type="text" name="sub_cat_name" class="form-control  @error('sub_cat_name') is-invalid @enderror" id="sub_cat_name" placeholder="">
                @error('sub_cat_name')
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


      /*  function allData(){

           $.ajax({
                 type: 'GET',
                dataType: 'json',
                url: "all/data/cat",
                success: function(response){
                   var data =""
                    $.each(response.data , function(key, value){
                        data = data + "<tr>"
                        data = data + "<td>"+value.id+"</td>"
                        data = data + "<td>"+value.cat_name+"</td>"
                        data = data + "<td>"
                        if (value.status==1) {
                           data = data + "<span class='badge badge-success'>Active</span>" 
                        }else{
                              data = data + "<span class='badge badge-danger'>Unactive</span>"
                        }

                        
                        data = data + "</td>"
                        data = data + "<td>"
                        data = data + "<a href='' class='btn btn-success btn-sm mr-2'><i class='feather icon-thumbs-up'></i>&nbsp; </a>"
                        data = data + "<a href='' class='btn btn-info btn-sm mr-2'><i class='feather icon-edit'></i>&nbsp; </a>"
                        data = data + "<a href=''' class='btn btn-danger btn-sm mr-2'><i class='feather icon-trash-2'></i>&nbsp;</a>"
                        data = data + "</td>"
                        data = data + "<tr>"
                    })

                    $('tbody').html(data);

                    
                }
           })
        }
        allData();*/

        /*function store(){
            var cat_name = $('#cat_name').val();

           $.ajax({
                type: "POST",
                dataType: 'json',
                data:{
                    cat_name : cat_name,
                    _token: '{{ csrf_token() }}'
                },
                url: "store/data/cat",
                success:function(data){
                    allData();   
                }
            })

        }
*/

    </script>
    
   {{--  <script>
        $(document).ready( function () {

            $('#report-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('all/data/cat') }}",
                "columns": [
                    { "data": "id" },
                    { "data": "cat_name" },
                    { "data": "status" }
                ]
            });
        });

        

    </script> --}}
@endsection