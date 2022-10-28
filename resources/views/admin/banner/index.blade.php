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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $key=>$value)
                               <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td><img src="{{ URL::to($value->image) }}" height="80" width="80"></td>
                                    <td>
                                        @if($value->status==1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">UnActive</span>
                                        @endif
                                    </td>
                                    @if($eidt==010)
                                    <td>
                                        <form style="display: inline-block;" action="{{ url('eidt/banner') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp; </button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        @if($value->status==1)
                                        <a href="{{url('unactive/banner/'.$value->id) }}" class="btn btn-danger btn-sm"><i class="feather icon-thumbs-down"></i>&nbsp; </a>
                                        @else
                                        <a href="{{url('active/banner/'.$value->id) }}" class="btn btn-success btn-sm"><i class="feather icon-thumbs-up"></i>&nbsp; </a>
                                        @endif
                                        <form style="display: inline-block;" action="{{ url('eidt/banner') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp; </button>
                                        </form>
                                        <a href="{{ url('delete/banner/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="feather icon-trash-2"></i>&nbsp;</a>
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
    <form method="post" action="{{ url('upadate/banner') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data1->id }}">
    <div class="card">
        <div class="card-body">
            <h5>Eidt Banner</h5>
            <hr>
            <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="floating-label" for="title">Category</label>
                <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{ $data1->title }}" placeholder="">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" >
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ URL::to($data1->image) }}" height="80" width="80">
                    <input type="hidden" name="old_img" value="{{ $data1->image }}">
                </div>
            </div>
        </div>
        <div class="col-sm-12 mt-2">
            <button type="submit"  class="btn btn-primary">UPDATE</button>
            <a href="{{ route('Banner') }}" class="btn btn-outline-secondary" >Back</a>
        </div>
    </div>
        </div>
    </div>
    </form>
@else
<form method="post" action="{{ url('store/banner') }}" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-body">
            <h5>Banner</h5>
            <hr>
            <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="floating-label" for="title">Title</label>
                <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" id="title" placeholder="">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>     
        
        <div class="col-sm-12">
            <div class="form-group">
                <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="image" placeholder="">
                @error('image')
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