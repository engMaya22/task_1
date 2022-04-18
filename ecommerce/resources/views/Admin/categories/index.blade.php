@extends('backend.layouts.app')
@section('content')
   

          <div class="row">
            <div class="col-md-8">

              <div class="card">
                <div class="card-header">
                  <h3>Categories</h3>
                </div>
                <div class="card-body">
                  <ul class="list-group">
                  @if($categories->count()!==0)
                    @foreach ($categories as $category)
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          {{ $category->name }}

                          <div class="button-group d-flex">
                            
                            <a class="btn btn-sm btn-primary mr- 1"  href="{{route('category.edit',$category->id)}}">edit</a>

                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                              @csrf
                              @method('DELETE')

                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                          </div>
                        </div>

                        @if ($category->children)
                          <ul class="list-group mt-2">
                            @foreach ($category->children as $child)
                              <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                  {{ $child->name }}

                                  <div class="button-group d-flex">
                                  <a class="btn btn-sm btn-primary mr-1 "  href="{{route('category.edit',$child->id)}}" >Edit</a>
                                      

                                    <form action="{{ route('category.destroy', $child->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')

                                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </li>
                            @endforeach
                          </ul>
                        @endif
                      </li>
                    @endforeach
                    @endif
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3>Create Category</h3>
                </div>

                <div class="card-body">
                  <form action="{{ route('category.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <select class="form-control m-2" name="parent_id">
                        <option value="" disable>Select Parent Category</option>

                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <input type="text" name="name" class="form-control m-2" value="{{ old('name') }}" placeholder="Category Name" required>
                    </div>

                    <div class="form-group m-2">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
          

        <!-- ---------------create parent ---- -->
        
        <!-- <div class="col-md-4 float-right">
        <div class="card" >
    <div class="card-body">
    <h5 class="card-title">Create Category</h5>
    
    <form action="{{route('category.store')}}"  method="post">
        @csrf
   <div class="form-group">
    <label >Category Name </label>
    <input type="text" class="form-control"  name="name" placeholder="Enter Name">
   </div>
  <button type="submit" class="btn btn-primary">Create</button>
 </form>
   
  </div>
</div>
</div> -->
<!-- -----end create parent---------------------------- -->

  
    @endsection

