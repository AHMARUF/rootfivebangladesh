@extends('layouts.admin_layouts')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center m-l-0">
            </div>
            <div class="table-responsive">
                <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Create Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $user = DB::table('users')->get();
                        @endphp
                        @foreach($user as $rows)
                        <tr role="row" class="odd">
                                <td class="sorting_1">
                                    <img src="{{asset('https://www.gravatar.com/avatar/92aaa4e34f377aa928557378428caf30?s=70&d=mp&r=g')}}" class="img-fluid img-radius wid-40" alt="">
                                </td>
                                <td>{{ $rows->firstname }} {{ $rows->lastname }}</td>
                                <td>{{ $rows->email }}</td>
                                <td>{{ $rows->telephone }}</td>
                                <td>{{ $rows->created_at }}</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{ url('delete/users/'.$rows->id) }}" class="btn btn-outline-danger btn-sm" id="delete"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            {{-- [ User List ] end --}}  
@endsection  