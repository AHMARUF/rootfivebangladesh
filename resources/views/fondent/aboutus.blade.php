@extends('layouts.layout')
@section('content')
<div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="{{ url('about-us') }}">About Us</a></li>
        </ul>
    </div>
</section>
<section class="info-page bg-bt-gray p-tb-15 " style="padding-top: 50px;">
  <div class="container content ws-box m-auto">
    @php
      $data=App\Models\About::where('id', 1)->first();
      echo $data->content;
    @endphp 
  </div>
</section>

@endsection