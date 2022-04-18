@extends('backend.layouts.app')
@section('content')
<div class="col-md-4 float-right">
        <div class="card" >
    <div class="card-body">
    <h5 class="card-title">Update Category</h5>
    
    
    <form action="{{route('category.update',$category->id)}}"  method="post">
        @method('PUT')
        @csrf
   <div class="form-group">
    <label >Category Name </label>
    <input type="text" class="form-control"  name="name" value="{{$category->name}}">
   </div>
  <button type="submit" class="btn btn-primary">Update</button>
 </form>
   
  </div>
</div>
</div>
@endsection