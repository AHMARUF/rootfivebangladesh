@extends('layouts.layout')
@section('content')
<div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="{{ url('terms-and-conditions') }}">Terms and Conditions</a></li>
        </ul>
    </div>
</section>
<section class="info-page bg-bt-gray p-tb-15 "style="padding-top: 50px;">
  <div class="container content ws-box m-auto">
    <style>
	#rr-policy{
		font-family: "Trebuchet MS", sans-serif;
		font-size: 16px;
	}


	.bckg-white{
		background: #ffffff;
		border-radius: 5px;
		box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
		padding: 30px;
	}
	#rr-policy hr{
		border: 1px solid #EF4A23;
	}

	#rr-policy li{
		margin: 12px 0;
		line-height: 25px;
	}

	#rr-policy label{
		font-size: 20px;
	}

	#rr-policy ul{
		padding: 0 25px;
	}

	.ws-box {
	    background: transparent;
	    border-radius: 5px;
	    box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
	}

	.info-page .content {
	    padding: 0;
	}
</style>

<div id="rr-policy" >
	<div class="bckg-white">
		@php
			$data=App\Models\Terms::where('id', 1)->first();
			echo $data->content;
		@endphp
		
		
		
			
				
	</div>
</div>  
</div>
</section>
@endsection