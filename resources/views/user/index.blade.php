@extends('layouts.layout')

@section('content')
<section class="after-header p-tb-10">
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="material-icons" title="Home">home</i></a></li>
        <li><a href="{{ url('/home') }}">Account</a></li>
    </ul>
</div>
</section>
<div class="container ac-layout">
    <div class="ac-header">
    <div class="left">
      <span class="avatar">
        <img src="https://www.gravatar.com/avatar/92aaa4e34f377aa928557378428caf30?s=70&amp;d=mp&amp;r=g" width="80" height="80" alt="" style="border-radius: 0px;border: 1px solid #3749BB;"></span>
      <div class="name"><p>Hello,</p><p class="user">{{ Auth::user()->firstname; }} {{ Auth::user()->lastname; }}</p></div>
    </div>
    <div class="right">
      {{-- <div class="balance">
        <span class="blurb">Star Points</span>
        <span class="amount">0</span>
      </div>
      <div class="balance">
        <span class="blurb">Store Credit</span>
        <span class="amount">0</span>
      </div> --}}
    </div>
</div>

<ul class="navbar-nav ac-navbar">
   <li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link">
        <i class="material-icons">home</i>Home
    </a>
  </li>
  <li class="nav-item">
  	<a href="{{ url('account/order') }}" class="nav-link">
  		<span class="material-icons">chrome_reader_mode</span>Orders
  	</a>
  </li>
  <li class="nav-item">
  	<a href="{{ url('account/edit') }}" class="nav-link">
  		<span class="material-icons">person</span>Edit Account
  	</a>
  </li>
  <li class="nav-item">
  	<a href="{{ url('account/password') }}" class="nav-link">
  		<span class="material-icons">lock</span>Password</a>
  	</li>
  <li class="nav-item">
  	<a href="{{ url('account/address') }}" class="nav-link">
  		<span class="material-icons">book</span>Addresses
  	</a>
  </li>
  <li class="nav-item">
  	<a href="{{ url('account/wishlist') }}" class="nav-link">
  		<span class="material-icons">favorite_border</span>Saved List
  	</a>
  </li>
  <li class="nav-item">
  	<a href="{{ url('account/pc') }}" class="nav-link">
  		<span class="material-icons">important_devices</span>Saved Pc
  	</a>
  </li>
  <li class="nav-item">
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="nav-link">
        <span class="material-icons">input</span>Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display: inline-block;">
         @csrf
    </form>
  </li>
  
</ul>
    <div class="ac-menus">
         @yield('content_user')        
    </div>
    </div>
   </div>
</div>

@endsection