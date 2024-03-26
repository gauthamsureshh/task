@extends('Layouts.main')
@section('css')
<link rel="stylesheet" href="{{URL::asset('css/homePage.css')}}"/>
@endsection
@section('content')
<div class="container-fluid">
    <div class="card">
        <h1>Welcome</h1>
        @auth
        <div class="buttons">
            <a class="btn btn-outline-primary" href="{{route('customerlist')}}">Customer Management</a>
            <a class="btn btn-outline-success" href="#">Task Management</a>
            <a class="btn btn-outline-warning" href="#">Invoice Management</a>
        </div>
        @else
            <h6>Let's Get Started,<a href="{{route('loginpage')}}">Login</a></h6>
        @endauth
        
    </div>
    
</div>

@endsection