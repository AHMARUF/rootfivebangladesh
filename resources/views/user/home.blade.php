@extends('user.index')

@section('content_user')

<div class="ac-menu-item">
    <a href="{{ url('account/order') }}" class="ico-btn"><span class="material-icons">chrome_reader_mode</span><span>Orders</span></a>
</div>
<div class="ac-menu-item">
    <a href="{{ url('account/edit') }}" class="ico-btn"><span class="material-icons">person</span><span>Edit Profile</span></a>
</div>
<div class="ac-menu-item">
    <a href="{{ url('account/password') }}" class="ico-btn"><span class="material-icons">lock</span><span>Change Password</span></a>
</div>
<div class="ac-menu-item">
    <a href="{{ url('account/address') }}" class="ico-btn"><span class="material-icons">book</span><span>Addresses</span></a>
</div>
<div class="ac-menu-item">
    <a href="{{ url('account/wishlist') }}" class="ico-btn"><span class="material-icons">favorite_border</span><span>Wish List</span></a>
</div>
<div class="ac-menu-item">
    <a href="{{ url('account/pc') }}" class="ico-btn"><span class="material-icons">important_devices</span><span>Saved PC</span></a>
</div>
<div class="ac-menu-item h-desk">
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="ico-btn"><span class="material-icons">input</span><span>Logout</span></a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display: inline-block;">
         @csrf
    </form>

    
    
</div> 

@endsection