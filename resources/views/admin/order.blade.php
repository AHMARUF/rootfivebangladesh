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
                            <th>Invoice ID</th>
                            <th>Name</th>
                            <th>Phome</th> 
                            <th>Address</th>
                            <th>Issued on</th>
                            <th>total TK</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody>
                         @php 
                            $Porder = DB::table('orders')->orderBy('id', 'DESC')->get();
                        @endphp
                        @foreach($Porder as $rows)
                        <tr>
                            <td>{{ $rows->invoice_id }}</td>
                            <td>{{ $rows->fastname }} {{ $rows->lastname }}</td>
                            <td>{{ $rows->phone }}</td>
                            <td>{{ $rows->address }}</td>
                            <td>{{ $rows->time }}</td>
                            <td>{{ number_format((float)($rows->amount), 2) }}TK</td>
                            <td>
                                @if($rows->status == "Processing")
                                <span class="badge badge-warning">Pending</span>
                                @else
                                <span class="badge badge-success">completed</span>
                                @endif
                            </td>
                            <td>
                             	<form style="display: inline-block;" action="{{ url('view/order/') }}" method="post">
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $rows->id }}">
                                    <button class="btn btn-outline-success btn-sm"><i class="feather icon-eye"></i></button>
                                 </form>

                                 <a href="{{ url('delete/order/'.$rows->id) }}" class="btn btn-outline-danger btn-sm" id="delete"><i class="feather icon-trash-2"></i></a>
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