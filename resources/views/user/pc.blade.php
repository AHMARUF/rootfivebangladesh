@extends('user.index')

@section('content_user')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="ac-title">
                <h1>Saved PC</h1>
            </div>
        </div>
        <style type="text/css">
.ac-menus a{
        flex: 1 1 auto;
    text-align: center;
    background: #fff;
    border: 0px solid #eee;
    border-radius: 0px;
    padding: 0px;
    box-shadow: none;
    -webkit-transition: all 300ms ease;
    -moz-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
    -o-transition: all 300ms ease;
    transition: all 300ms ease;
}
.ac-menus a:hover{
    border: 0px solid #eee;
    border-radius: 0px;
    padding: 0px;
    box-shadow: none;
}
    </style>
        <div class="col-md-12">
            @php 
            $user = Auth::id();
            $data1 = App\Models\Pc_save::orderBy('id', 'desc')->where('user_id',$user)->first();

            $data = App\Models\Pc_save::orderBy('id', 'desc')->where('user_id',$user)->get();
            @endphp
            @if($data1)
            @foreach($data as $rows)
            <div class="cards">
                <div class="card">
            <div class="img-n-title">
                <div class="img-wrap">
                    <span class="material-icons ico-image">important_devices</span>
                </div>
                <div class="title">
                    <h6 class="item-name">#{{ $rows->pc_id }} - {{ $rows->name }}</h6>
                    <p></p>
                </div>
            </div>
            <div class="date">
                <p>Date Added</p>
                <p class="fade">{{ $rows->created_at }}</p>
            </div>
            <div class="actions">
                <a href="{{ url('pc_builder/pc_view/'.$rows->pc_id) }}" title="Delete" class="ac-icon"><span class="material-icons fa fa-eye"></span></a>
                <a href="{{ url('pc_builder/pc_delete/'.$rows->id) }}" title="Delete" class="ac-icon"><span class="material-icons">delete</span></a>
                
            </div>
        </div>
            </div>
            @endforeach
            @else
            <p>You have not save any PC</p>
            @endif
        </div>
        
    </div>
</div>
        
        
                
@endsection