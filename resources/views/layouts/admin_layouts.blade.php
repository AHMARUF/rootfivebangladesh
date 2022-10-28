<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }} | {{ ('Admin Panel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('public/asset/asset/img/logo.png') }}" type="image/x-icon">
    {{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('public/asset/dist/assets/css/style.css')}}">
    <!-- data tables css -->
    <link rel="stylesheet" href="{{asset('public/asset/dist/assets/css/plugins/dataTables.bootstrap4.min.css')}}">
     <link rel="stylesheet" href="{{asset('public/asset/dist/assets/css/plugins/trumbowyg.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">

    <!-- Toastr message link -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <style type="text/css">
      .bts{
        margin-left: 10px!important;
      }
    </style>
</head>
<body class="">
@guest

@else
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="{{ asset('public/asset/asset/img/profil1e.png') }}" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							{{-- <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li> --}}
							<li class="list-group-item"><a href="{{route('password.change')}}"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="{{route('admin.logout')}}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
					    <label>Navigation</label>
					</li>
					<li class="nav-item">
					    <a href="{{url('admin/home')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ route('Banner') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Banner</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{route('category')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Category </span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ route('Sub/category') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Sub Category</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ route('brand') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Brand</span></a>
					</li>
					{{-- <li class="nav-item pcoded-menu-caption">
					    <label>Product</label>
					</li> --}}
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Product</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{ route('product.add') }}" >Product</a></li>
					        <li><a href="{{ route('product') }}">Manage Product</a></li>
					    </ul>
					</li>
					<li class="nav-item">
					    <a href="{{ route('all.order') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Order</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ route('all.users') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Users</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Page</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{ route('about_page') }}" >About Us</a></li>
					        <li><a href="{{ route('Privacy_Policy') }}">Privacy Policy</a></li>
					        <li><a href="{{ route('Terms_And_Conditions') }}">Terms And Conditions</a></li>
					    </ul>
					</li>
					<li class="nav-item">
					    <a href="{{ route('message') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Message</span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="{{ asset('public/asset/asset/img/logo.png') }}" alt="" class="logo" height="40">
						<img src="{{ asset('public/asset/asset/img/logo.png') }}" alt="" class="logo-thumb" height="40">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">

						{{-- \\\\\\\\ --}}
						 <li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notifications</h6>
										<div class="float-right">
											<a href="#!" class="m-r-10">mark as read</a>
											<a href="#!">clear all</a>
										</div>
									</div>
									<ul class="noti-body">
										<li class="n-title">
											<p class="m-b-0">NEW</p>
										</li>
										@php
										$message = DB::table('contacts') ->latest()->limit(5)->get(); 
										@endphp
										@foreach($message as $rows)
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="{{asset('public/asset/asset/img/profil1e.png')}}" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>{{ $rows->name }}</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>{{ \Carbon\Carbon::parse($rows->created_at)->diffForHumans() }}</span></p>
													<p>{{ $rows->subject }}</p>
												</div>
											</div>
										</li>
										@endforeach
										<li class="n-title">
											<p class="m-b-0">EARLIER</p>
										</li>
										@php
										$messagee = DB::table('contacts') ->orderBy('id','asc')->limit(2)->get(); 
										@endphp
										@foreach($messagee as $row)
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="{{asset('public/asset/dist/assets/images/user/avatar-2.jpg')}}" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>{{ $row->name }}</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span></p>
													<p>{{ $row->subject }}</p>
												</div>
											</div>
										</li>
										@endforeach
									</ul>
									<div class="noti-footer">
										<a href="{{ route('message') }}">show all</a>
									</div>
								</div>
							</div>
						</li> 

						{{-- \\\\\\\\\ --}}
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="{{ asset('public/asset/asset/img/profil1e.png') }}" class="img-radius" alt="User-Profile-Image" style="background-color: #fff;">
										<span>{{ Auth::user()->name }}</span>
										<a href="{{route('admin.logout')}}" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="{{route('password.change')}}" class="dropdown-item"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
										<li><a href="{{route('admin.logout')}}" class="dropdown-item"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"> Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/home')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
       
        @endguest


		@yield('content')
    </div>
</div>


    <!-- Required Js -->
    <script src="{{asset('public/asset/dist/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('public/asset/dist/assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/asset/dist/assets/js/ripple.js')}}"></script>
    <script src="{{asset('public/asset/dist/assets/js/pcoded.min.js')}}"></script>

	<!-- Apex Chart -->
	<script src="{{asset('public/asset/dist/assets/js/plugins/apexcharts.min.js')}}"></script>

	<!-- datatable Js -->
	<script src="{{asset('public/asset/dist/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('public/asset/dist/assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('public/asset/dist/assets/js/pages/data-basic-custom.js')}}"></script>
	<!-- custom-chart js -->
	<script src="{{asset('public/asset/dist/assets/js/pages/dashboard-main.js')}}"></script>
{{-- <script src="{{asset('public/asset/dist/assets/js/pages/chart-apex.js')}}"></script>
 --}}	<script>
        // DataTable start
        $('#report-table').DataTable();
        // DataTable end

        // DataTable start
        $('#report-Order').DataTable();
        // DataTable end
    </script>

    <!-- toastr message js -->
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 
<script type="text/javascript">
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

    switch(type){
      case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
      
@endif

</script>

<!-- sweetalert2 js -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<script type="text/javascript">
  $(document).on("click", "#delete", function(e) {
    e.preventDefault();
    var link= $(this).attr("href");
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
    confirmButton: 'btn btn-success bts',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success',
      window.location.href=link
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe',
      'error'
    )
  }
})

  });
</script>
<!-- trumbowyg editor -->
<script src="{{asset('public/asset/dist/assets/js/plugins/trumbowyg.min.js')}}"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#tinymce-editor').trumbowyg({
            svgPath: '{{asset('public/asset/dist/assets/css/plugins/icons.svg')}}'
        });
    });

    $(window).on('load', function() {
        $('#tinymce-editor1').trumbowyg({
            svgPath: '{{asset('public/asset/dist/assets/css/plugins/icons.svg')}}'
        });
    });

    $(window).on('load', function() {
        $('#tinymce-editor2').trumbowyg({
            svgPath: '{{asset('public/asset/dist/assets/css/plugins/icons.svg')}}'
        });
    });
</script>

<div id="support-chart" style="display: none;visibility: hidden;"></div>
<div id="support-chart1" style="display: none;visibility: hidden;"></div>
<div id="seo-chart1" style="display: none;visibility: hidden;"></div>
<div id="seo-chart2" style="display: none;visibility: hidden;"></div>
<div id="seo-chart3"  style="display: none;visibility: hidden;"></div>
<div id="power-card-chart1" style="display: none;visibility: hidden;"></div>

<div id="power-card-chart3" style="display: none;visibility: hidden;"></div>
           
</body>

</html>
