@extends('layouts.admin_layouts')

 @section('content') 
<form method="post" action="{{ url('store/product') }}" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-body">
            <h5>Add Product</h5>
            <hr>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label class="floating-label" for="product_Name">Product Name</label>
                  <input type="text" name="product_Name" class="form-control  @error('product_Name') is-invalid @enderror" id="product_Name"  placeholder="" autocomplete="off">
                    @error('product_Name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="floating-label" for="product_code">Product code</label>
                  <input type="text"  class="form-control  @error('product_code') is-invalid @enderror" id="product_code"  value="{{ $product_code }}" disabled="">
                  <input type="hidden" name="product_code" value="{{ $product_code }}">
                    @error('product_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="floating-label" for="category">Category</label>
                  <select name="cat_id" class="form-control  @error('cat_id') is-invalid @enderror" id="category">
                    <option value="">Select One........</option>
                    @php
                    $cat=App\Models\Category::where('status',1)->get();
                    @endphp
                    @foreach($cat as $row)
                    <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                    @endforeach
                  </select>
                    @error('cat_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="floating-label" for="sub_category">Sub Category</label>
                  <select name="sub_cat_id" class="form-control  @error('sub_cat_id') is-invalid @enderror" id="sub_category">
                    <option value="">Select One........</option>
                  </select>
                    @error('sub_cat_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="floating-label" for="brand_select">Brand</label>
                  <select name="brand_id" class="form-control  @error('brand_id') is-invalid @enderror" id="brand_select">
                    <option value="">Select One........</option>
                  </select>
                    @error('brand_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="floating-label" for="PC_builder">PC Builder</label>
                  <select name="PC_builder" class="form-control  @error('PC_builder') is-invalid @enderror" id="PC_builder">
                    <option value="1">Select One........</option>
                    <option value="2">CPU</option>
                    <option value="3">CPU Cooler</option>
                    <option value="4">Mother Board</option>
                    <option value="5">RAM</option>
                    <option value="6">Storage</option>
                    <option value="7">Graphics Card</option>
                    <option value="8">Power Supply</option>
                    <option value="9">Casing</option>
                    <option value="10">Casing Cooler</option>
                    <option value="11">Monitor</option>
                    <option value="12">Keyboard</option>
                    <option value="13">Mouse</option>
                    <option value="14">Headphone</option>
                    <option value="15">Anti Virus</option>
                    <option value="16">UPS</option>
                  </select>
                    @error('PC_builder')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-md-12">
               <textarea name="Key_Features" id="tinymce-editor" class="trumbowyg-textarea" style="height: 42px;" tabindex="-1">
                &lt;p&gt;Key Features..&lt;/p&gt;
               </textarea>    
              </div>
              <div class="col-md-12">
               <textarea name="Specification" id="tinymce-editor1" class="trumbowyg-textarea" style="height: 42px;" tabindex="-1">
               &lt;p&gt;Specification..&lt;/p&gt;
               </textarea> 
                 
              </div>
              <div class="col-md-12">
               <textarea name="Description" id="tinymce-editor2" class="trumbowyg-textarea" style="height: 42px;" tabindex="-1" placeholder="">                       
                &lt;p&gt;Description..&lt;/p&gt;
               </textarea>    
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="floating-label" for="quantity">Quantity</label>
                  <input type="text" name="quantity" class="form-control  @error('quantity') is-invalid @enderror" id="quantity" placeholder=""autocomplete="off">
                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="floating-label" for="Price">Price</label>
                  <input type="text" name="Price" class="form-control  @error('Price') is-invalid @enderror" id="Price"  placeholder=""autocomplete="off">
                    @error('Price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="floating-label" for="Regular_Price">Regular Price</label>
                  <input type="text" name="Regular_Price" class="form-control  @error('Regular_Price') is-invalid @enderror" id="Regular_Price"  placeholder=""autocomplete="off">
                    @error('Regular_Price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <input type="file" name="image" class="validation-file  @error('image') is-invalid @enderror"  placeholder="Image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            <div class="col-sm-12">
                <button type="submit"  class="btn btn-primary">Submit</button>
                <button class="btn btn-danger" type="reset">Clear</button>
            </div>
          </div>
        </div>
    </div>
  </form>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function () {
$('#category').on('change',function(e) {
var cat_id = this.value;
$.ajax({
    type: "POST",
    data:{
          cat_id : cat_id,
          _token: '{{ csrf_token() }}'
        },
                url: "{{ route('subcat') }}",
                success:function(response){
                      var data =""
                      data = data + "<option value="+0+">"+"Select One........"+"</option>"
                    $.each(response.data , function(key, value){
                      
                        data = data + "<option value="+value.id+">"+value.sub_cat_name+"</option>"
                     
                       
                    })

                    $('#sub_category').html(data);

                    
                }
                
            })

});
});



$(document).ready(function () {
$('#sub_category').on('change',function(e) {
var cat_id = this.value;
$.ajax({
    type: "POST",
    data:{
          cat_id : cat_id,
          _token: '{{ csrf_token() }}'
        },
                url: "{{ route('brand/select') }}",
                success:function(response){
                      var data =""
                      data = data + "<option value="+0+">"+"Select One........"+"</option>"
                    $.each(response.data , function(key, value){
                      
                        data = data + "<option value="+value.id+">"+value.brand_name+"</option>"
                       
                    })

                    $('#brand_select').html(data);

                }
                
            })

});
});
</script>


@endsection 