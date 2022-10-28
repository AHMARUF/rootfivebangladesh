@extends('layouts.admin_layouts')

@section('content')
<div class="row">
	<div class="col-md-12">
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $key=>$value)
                               <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->subject }}</td>
                                    <td>{{ $value->message }}</td>
                                    <td>{{ $value->created_at->diffForHumans() }}</td>
                                    <td>
                                      {{--  @if($value->status==1)
                                       <a href="" class="btn btn-outline-success btn-sm"><i class="feather icon-eye"></i></a>
                                        @else
                                        <a href="" class="btn btn-outline-success btn-sm"><i class="feather icon-eye"></i></a> 
                                       @endif --}}
                                        <a href="{{ url('delete/message/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="feather icon-trash-2"></i></a>
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
    </div>   
</div>
</div>
@endsection