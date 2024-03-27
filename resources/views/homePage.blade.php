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
            <a class="btn btn-outline-success" href="{{route('tasklist')}}">Task Management</a>
            <a class="btn btn-outline-warning" href="{{route('invoicelist')}}">Invoice Management</a>
        </div>
        @else
            <h5 style="text-align: center">Let's Get Started,<a href="{{route('loginpage')}}">Login</a></h5>
        @endauth
        
    </div>
    
</div>

@endsection