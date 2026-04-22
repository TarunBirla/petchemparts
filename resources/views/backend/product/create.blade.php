@extends('backend.layouts.master')
@section('main-content')
<div class="card">
    <h5 class="card-header">Add Product</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Description</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="is_featured">Is Featured</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes                        
        </div>
              {{-- {{$categories}} --}}
        <div class="form-group">
          <label for="cat_id">Category <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group d-none" id="child_cat_div">
          <label for="child_cat_id">Sub Category</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--Select any category--</option>
        </select>
        </div>

        <div class="form-group">
        <label>Part Number</label>
        <input type="text" name="part_number" class="form-control" value="{{ old('part_number') }}">
      </div>

      <div class="form-group">
        <label>Model Number</label>
        <input type="text" name="model_number" class="form-control" value="{{ old('model_number') }}">
      </div>
      <div class="form-group">
    <label>PDF</label>
    <select name="pdf_id" class="form-control">
        <option value="">-- Select PDF --</option>

        @foreach($pdfs as $pdf)
            <option value="{{ $pdf->id }}"
                {{ isset($product) && $product->pdf_id == $pdf->id ? 'selected' : '' }}>
                {{ $pdf->title }} / {{ $pdf->file }}
            </option>
        @endforeach

    </select>
</div>
        <div class="form-group">
          <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
          <input id="price" type="number" step="0.01" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="discount" class="col-form-label">Discount(%)</label>
          <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{old('discount')}}" class="form-control">
          @error('discount')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <!-- <div class="form-group">
            <label for="size">Size</label>
            <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
                <option value="">--Select any size--</option>
                <option value="S">25X16in</option>
                <option value="M">36X36in</option>
            </select>
        </div> -->


<div class="form-group">
    <label>Manufacturer <span class="text-danger">*</span></label>
    <select name="manufacturer_id" class="form-control" required>
        <option value="">-- Select Manufacturer --</option>
        @foreach($manufacturers as $m)
            <option value="{{ $m->id }}">
                {{ $m->name }}
            </option>
        @endforeach
    </select>
</div>


         <div class="form-group">
          <label for="brand_id">Brand</label>
          {{-- {{$brands}} --}}

          <select name="brand_id" class="form-control">
              <option value="">--Select Brand--</option>
             @foreach($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->title}}</option>
             @endforeach
          </select>
        </div> 

        <div class="form-group">
          <label for="condition">Condition</label>
          <select name="condition" class="form-control">
              <option value="default">Default</option>
              <option value="new">New Arrival</option>
              <option value="gifting">Gifting</option>
              <option value="occastions">Occastions</option>

              <option value="best_seller">Best Seller</option>
          </select>
        </div>
       

        <div class="form-group">
          <label for="stock">Quantity <span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="{{old('stock')}}" class="form-control">
          @error('stock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
          <div class="input-group">
              <!-- <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span> -->
              <input id="thumbnail" class="form-control" type="file" name="photo[]" value="{{ old('photo') }}" multiple>

        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="country" class="col-form-label">Country <span class="text-danger">*</span></label>
          <input id="country" type="text" name="country" placeholder="Enter country"  value="{{old('country')}}" class="form-control">
          @error('country')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="sold_by" class="col-form-label">Sold By <span class="text-danger">*</span></label>
          <input id="sold_by" type="text" name="sold_by" placeholder="Enter Sold By"  value="{{old('sold_by')}}" class="form-control">
          @error('sold_by')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="name_of_manufacture" class="col-form-label">Name of Seller <span class="text-danger">*</span></label>
          <input id="name_of_manufacture" type="text" name="name_of_manufacture" placeholder="Enter Name of Manufacture"  value="{{old('name_of_manufacture')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name_of_address" class="col-form-label"> Address of Seller <span class="text-danger">*</span></label>
          <input id="address_of_manufacture" type="text" name="address_of_manufacture" placeholder="Enter Name of address"  value="{{old('address_of_manufacture')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endpush