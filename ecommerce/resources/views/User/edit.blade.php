@extends('backend.layouts.app')
@section('content')
<h3 class="text-center">The Information</h3>
    <form action="{{route('users.update',$user->id)}}" method="post">
        @method('PUT')
        @csrf
       
            <div class="container">
                          
                    <input type="text" name="name" class="form-control text-center" placeholder="your name"  value="{{$user->name}}" >
               
           
            
                <div class="form-group">          
                    <input type="email" name="email" class="form-control text-center" placeholder="your email" value="{{$user->email}}">
                </div>
            
          
                <div class="form-group">            
                    <input type="password" name="password" class="form-control text-center" placeholder="your password" value="{{$user->password}}">
                </div>
                <button class="btn btn-success m-2 ">Update</button>
        </div>
       
    </form>

 @endsection