@extends('layouts.admin_layouts')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form method="post" action="{{ url('about_store') }}">
        @csrf
        <input type="hidden" name="id" value="1">
    <div class="card">
        <div class="card-body">
            <h5>About Us</h5>
            <hr>
            <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <textarea name="content" id="tinymce-editor2" class="trumbowyg-textarea @error('content') is-invalid @enderror" style="height: 450px;" tabindex="-1">           
                	{{ $data->content }}            
               </textarea> 
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit"  class="btn btn-primary">UPDATE</button>
            <a href="{{ url('admin/home') }}" class="btn btn-outline-secondary" >Back</a>
        </div>
    </div>
        </div>
    </div>
    	</form>
	</div>
</div>
@endsection