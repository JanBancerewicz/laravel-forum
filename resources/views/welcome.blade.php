@extends('layouts.app')

@section('title', 'Formularz')

@section('content')
<h1>Fill out the form</h1>

<form action="" method="post">
    <div class="mb-3">
        <label for="user" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="user">
        
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
    
</form>

<a href="{{route('index')}}">Main page</a><br/>
<a href="{{url()->previous()}}">Previous page</a>


@endsection