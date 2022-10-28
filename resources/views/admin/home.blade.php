@extends('layouts.admin_layouts')

@section('content')

           
 {{-- [ Main Content ] start --}}
        <div class="row">
            <!-- customar project  start -->
             <div class="col-xl-3 col-sm-3 col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-users f-30 text-c-red"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Customers</h6>
                                @php 
                                    $users = DB::table('users')->count();
                                @endphp
                                <h2 class="m-b-0 text-right">{{ $users }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3 col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-grid f-30 text-c-purple"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Store Products</h6>
                                @php 
                                    $product = DB::table('products')->count();
                                @endphp
                                <h2 class="m-b-0 text-right">{{ $product }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3 col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-shopping-cart f-30 text-c-green"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">All Order </h6>
                                @php 
                                    $order = DB::table('orders')->count();
                                @endphp
                                <h2 class="m-b-0 text-right"> {{ $order }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-xl-3 col-sm-3 col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-trending-up f-30 text-c-blue"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Pandding Order</h6>
                                @php 
                                    $pan_order = DB::table('orders')->where('status', 'Processing')->count();
                                @endphp
                                <h2 class="m-b-0 text-right">{{  $pan_order }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- customar project  end --}}


            {{-- chart Start  --}}
             <div class="col-md-12">
               <div class="row">
                    <div class="col-sm-3 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                         @php
                                         $today = Carbon\Carbon::today()->format('d_m_Y');
                                         $total1 = DB::table('orders')->where('date',$today)->sum('amount'); 
                                         @endphp
                                        <h4 class="text-c-blue">৳{{number_format((float)($total1), 2) }}</h4>
                                        <h6 class="text-muted m-b-0">Today Earnings</h6>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="feather icon-bar-chart-2 f-28"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        @php
                                         $yesterday = Carbon\Carbon::yesterday()->format('d_m_Y');
                                         $total2 = DB::table('orders')->where('date',$yesterday)->sum('amount');
                                        @endphp
                                        <h4 class="text-c-blue">৳{{number_format((float)($total2), 2) }}</h4>
                                        <h6 class="text-muted m-b-0">Yesterday Earnings</h6>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="feather icon-bar-chart-2 f-28"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        @php
                                        $month = Carbon\Carbon::now()->format('m_Y');
                                        $total3 = DB::table('orders')->where('month',$month)->sum('amount');
                                        @endphp
                                        <h4 class="text-c-blue">৳{{number_format((float)($total3), 2)  }}</h4>
                                        <h6 class="text-muted m-b-0">Month Earnings</h6>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="feather icon-bar-chart-2 f-28"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        @php
                                       
                                           $year =Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  Carbon\Carbon::now() )->year;
                                        
                                        $total = DB::table('orders')->where('year',$year)->sum('amount');
                                       
                                        @endphp
                                        <h4 class="text-c-blue">৳{{number_format((float)($total), 2) }}</h4>
                                        <h6 class="text-muted m-b-0">Year Earnings</h6>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="feather icon-bar-chart-2 f-28"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                
                    <div class="col-sm-3 col-md-2 col-4">
                        <a href="{{ route('Banner') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12 text-center">
                                        @php
                                        $order = DB::table('banners')->count();
                                        @endphp
                                        <h4 class="text-c-blue">{{ $order }}</h4>
                                        <h6 class="text-muted m-b-0 text-uppercase">Banner</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-2 col-4">
                        <a href="{{ route('category') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12 text-center">
                                        @php
                                        $order = DB::table('categories')->count();
                                        @endphp
                                        <h4 class="text-c-blue">{{ $order }}</h4>
                                        <h6 class="text-muted m-b-0 text-uppercase">Category</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-2 col-4">
                        <a href="{{ route('Sub/category') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12 text-center">
                                        @php
                                        $order = DB::table('subcategories')->count();
                                        @endphp
                                        <h4 class="text-c-blue">{{ $order }}</h4>
                                        <h6 class="text-muted m-b-0 text-uppercase">Sub Category</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-2 col-4">
                        <a href="{{ route('brand') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12 text-center">
                                        @php
                                        $order = DB::table('brands')->count();
                                        @endphp
                                        <h4 class="text-c-blue">{{ $order }}</h4>
                                        <h6 class="text-muted m-b-0 text-uppercase">brand</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-2 col-4">
                        <a href="{{ route('product') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12 text-center">
                                        @php
                                        $order = DB::table('products')->count();
                                        @endphp
                                        <h4 class="text-c-blue">{{ $order }}</h4>
                                        <h6 class="text-muted m-b-0 text-uppercase">product</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-2 col-4">
                        <a href="{{ route('all.order') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12 text-center">
                                        @php
                                        $order = DB::table('orders')->count();
                                        @endphp
                                        <h4 class="text-c-blue">{{ $order }}</h4>
                                        <h6 class="text-muted m-b-0 text-uppercase">order</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        
            {{-- Start Order Table This Months --}}
             <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                    </div>
                    <div class="table-responsive">
                        <table id="report-Order" class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phome</th> 
                                    <th>Address</th>
                                    <th>Issued on</th>
                                    <th>total TK</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php 
                                    $Porder = DB::table('orders')->orderBy('id', 'desc')->get();
                                @endphp
                                @foreach($Porder as $rows)
                                <tr>
                                    <td>{{ $rows->invoice_id }}</td>
                                    <td>{{ $rows->fastname }} {{ $rows->lastname }}</td>
                                    <td>{{ $rows->email }}</td>
                                    <td>{{ $rows->phone }}</td>
                                    <td>{{ $rows->address }}</td>
                                    <td>{{ $rows->time }}</td>
                                    <td>{{ number_format((float)($rows->amount), 2)}}TK</td>
                                    <td>
                                        @if($rows->status == "Processing")
                                        <span class="badge badge-warning">Pending</span>
                                        @else
                                        <span class="badge badge-success">completed</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            {{-- End Order Table This Months --}}

         {{-- [ user List ] start --}}
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
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            {{-- [ User List ] end --}}

        </div>
        {{-- [ Main Content ] end --}}
        

        
@endsection  