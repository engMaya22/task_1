@extends('backend.layouts.app')
@section('content')
   
<div class="table-responsive  ">
                        <!-- Projects table -->
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                     <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($allUsers->count()!==0)
                               @foreach($allUsers as $user)
                               <tr>
                                   <td>{{$user->id}}</td>
                                   <td>{{$user->name}}</td>
                                   <td>{{$user->email}}</td>
                                  
                                   <td> 
                                   <div class="button-group d-flex">
                                       <a class=" btn btn-sm btn-primary mr-1 " href="{{route('users.edit',$user->id)}}">Edit  </a>
                                
                                
                                   <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-sm btn-danger ">Delete </button>
                        
                        </form>
                                      </div>
                                </td>
                               
                                </tr>
                               @endforeach
                              @endif

                            </tbody>
                        </table>
                        
                    </div>
                   
@endsection
