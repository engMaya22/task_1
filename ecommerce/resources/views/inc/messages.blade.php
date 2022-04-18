{{-- count the errors --}}
{{-- errors messages --}}
@if (count($errors)>0)
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif

{{-- if there is no error --}}
@if (session('success')){
    <div class="alert alert-success">
        {{-- message to the page --}}
        <strong>{{session('success')}}</strong>
    </div>    
@endif

{{-- session messages --}}
{{-- if there is an error --}}
@if (session('error')){
    <div class="alert alert-danger">
        {{-- message to the page --}}
        <strong>{{session('error')}}</strong>
    </div>    
@endif

