@extends('backend.layouts.app')
@section('content')
   
<h3 class="text-center">edit Information</h3>

                   <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                   @method('PUT')
                   @csrf
                   <div class="row">
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="text" name="title" class="form-control"   value="{{$product->title}}" >
          </div>
    </div>
         

 
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="text" name="description" class="form-control" value="{{$product->description}}">
          </div>
    </div>
         
 
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="file" name="photo_url" class="form-control"  value="{{$product->photo_url}}">
          <div class="container">
            <img src="{{$product->photo_url}}" alt="category_image" class="w-25">

          </div>
        </div>
    </div>
      
 <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="text" name="price" class="form-control" value="{{$product->price}}"  >
          </div>
    </div>

   
    <div class="col-md-12">
    <div class="form-group">

  

                      <select class="form-control" name="category_id">
                        <option value="" disabled>Select Category</option>

                        @foreach ($categories as $category)
                       
                      
                                <option value="" disabled>{{ $category->name }}</option>
                            @if ($category->children)
                                @foreach ($category->children as $child)
                                  <option value="{{ $child->id }}" {{ $child->id == old('category_id')? 'selected' : '' }}> {{ $child->name }}</option> 
                                @endforeach
                            @endif
                           
                        @endforeach
                        
                        
                      </select>
                    </div>
</div>

 <div class="col-md-12">
      <div class="form-group">
        

            <input type="submit" value="update" class="btn btn-success">
</div>
</div>
</div>

                   </form>
                </div>
            </div>
        </div>
        @endsection