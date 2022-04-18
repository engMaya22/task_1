
@extends('frontend.layouts.app')
@section('content')
<div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Categories  List</h3>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @if($categories->count()!==0)
            @foreach ($categories as $category)
                <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                   
                    <div class="flex items-end justify-end w-full bg-cover">

                    </div>
                    <div class="px-5 py-3">
                    @php
                     $counter = $counter +1;
                    @endphp
                        <h3 class="text-gray-700 uppercase mb-3">{{ $category->name }}</h3>
                       <button class="px-4 py-2 text-white bg-blue-800 rounded"><a href="{{route('category1.show', $category->id)}}">sub categories{{$counter}}</a></button>     
                        </div>

                    </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection
