
@extends('backend.layouts.app')
@section('content')
   
<div class="table-responsive  ">
    <div class="container mb-3">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3>Create Product</h3>
                </div>

                <div class="card-body">
                  <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf

                    <div class="form-group">
                      
                      <select class="form-control  m-1" name="category_id">
                       
                      <option value="" disabled="disabled">Select Category</option>
                        @foreach ($categories as $category)
                                  
                                <option value="" disabled="disabled">{{ $category->name }}</option>
                            @if ($category->children)
                                @foreach ($category->children as $child)
                                 <option value="{{ $child->id }}"  }}>&nbsp;&nbsp;{{ $child->name }}</option>
                                @endforeach
                            @endif
                           
                        @endforeach
                        
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <input type="text" name="title" class="form-control m-1"  placeholder="Product title" required>
                    </div>
                     <div class="form-group">
                         <input type="text" name="description" class="form-control m-1" placeholder="Product Description" required>
                     </div>
                    
                     <div class="form-group">
                         <input type="file" name="photo_url"  class="form-control m-1" placeholder="Product photo" required>
                     </div>
                     <div class="form-group">
                         <input type="text" name="price" class="form-control m-1" placeholder="product price" required>
                     </div>



                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header">
                  <h3>products</h3>
                </div>
                <div class="card-body">
                 

                  <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">title</th>
                                    <th scope="col">description</th>
                                    <th scope="col">image</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($products->count()!==0)
                               @foreach($products as $product)
                               <tr>
                                   <td>{{$product->id}}</td>
                                   <td>{{$product->title}}</td>
                                   <td>{{$product->description}}</td>
                                   <td><img src="{{$product->photo_url }}"  class="w-50"   /></td>
                                   <td>{{$product->price}}</td>
                                   <td>{{$product->category->name}}</td>
                                   <td> 
                                   <div class="button-group d-flex">
                                       <a class="btn btn-sm btn-primary mr-1 " href="{{route('product.edit',$product->id)}}">Edit  Product</a>
                                
                                
                                   <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-sm btn-danger">Delete Product</button>
                                  
                                      </form>
                                   </div>
                                      
                                </td>
                               
                                </tr>
                               @endforeach
                    
                               @endif
                            </tbody>
                        </table>
                        
                    </div>




                   
                </div>
              </div>
            </div> 

           <!-- --------------------------------------- -->
          </div>
        </div>
          

      

  
    @endsection




