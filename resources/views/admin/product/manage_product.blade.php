@extends('layouts.admin_layouts')
@section('content')
                 
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
                                    <th>Product</th>
                                    <th>Category </th>
                                    <th>Price </th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $key=>$value)
                               <tr>
                                    <td class="align-middle sorting_1">
                                            <img src="{{URL::to($value->image) }}" alt="contact-img" title="contact-img" class="rounded mr-3" height="48">
                                            <p  class="m-0 d-inline-block align-middle font-16">
                                                <a href="#!" class="text-body">{{ $value->product_Name }}</a>
                                                <br>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                            </p>
                                        </td>
                                    <td class="align-middle">{{ $value->category->cat_name }}</td>
                                    <td class="align-middle">$ {{ $value->Price }}</td>
                                    <td class="align-middle">{{ $value->quantity }}</td>
                                    <td>
                                        @if($value->status==1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">UnActive</span>
                                        @endif 
                                    </td>
                                    <td>
                                       @if($value->status==1)
                                        <a href="{{url('unactive/product/'.$value->id) }}" class="btn btn-danger btn-sm"><i class="feather icon-thumbs-down"></i>&nbsp; </a>
                                        @else 
                                        <a href="{{url('active/product/'.$value->id) }}" class="btn btn-success btn-sm"><i class="feather icon-thumbs-up"></i>&nbsp; </a>
                                     @endif 
                                     <form style="display: inline-block;" action="{{ url('view/product') }}" method="post">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $value->id }}">
                                        <button class="btn btn-success btn-sm"><i class="feather icon-eye"></i>&nbsp; </button>
                                     </form>
                                        <form style="display: inline-block;" action="{{ url('eidt/product') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $value->id }}">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp; </button>
                                        </form>
                                        <a href="{{ url('delete/product/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="feather icon-trash-2"></i>&nbsp;</a>
                                    </td>
                                </tr>
                            @endforeach
 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- customar project  end -->

               {{--  https://ableproadmin.com/bootstrap/default/ecom-product.html --}}
@endsection 