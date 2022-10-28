@extends('user.index')

@section('content_user')
<div class="ac-title">
	<h1>Save Your PC</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			@php
			$id = Auth::id();
			@endphp
			<form action="{{ url('pc_builder/pc_save/'.$id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
				@csrf
        <div class="form-group required">
            <label for="input-name">Name</label>
            <input type="text" name="name" value="" placeholder="Name" id="input-name" class="form-control">
                    </div>
        <div class="form-group">
            <label for="input-description">Description</label>
            <input name="description" id="input-description" class="form-control" value="" placeholder="Description">
                    </div>
        <button type="submit" class="btn btn-primary">Save</button>
    	</form>
				
		</div>
	</div>
</div>

@endsection