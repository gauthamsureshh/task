@extends('Layouts.main')

@section('css')
<link rel="stylesheet" href="{{URL::asset('css/auth.css')}}"/>
@endsection

@section('title','Sign Up')
@section('content')
<div class="container-fluid">
    <div class="mt-5">
        @if ($errors->any())
            <div class="col">
                @foreach ($errors->all() as $error )
                <script>toastr.error('{{ $error }}')</script>
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @elseif (session()->has('errors'))
            <div class="alert alert-danger">
                {{session('errors')}}
            </div>
        @endif
    </div>
        <form method="post" action="{{route('register.post')}}" class="mr-auto ml-auto mt-3" style="width: 500px">
            @csrf
            @method('post')
            <div class="form-group">
                <label >Username</label>
                <input type="text" class="form-control" placeholder="Username" name="name">
            </div>
            <div class="form-group">
                <label >Email Address</label>
                <input type="email" class="form-control"   placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role">
                    <option value="" disabled selected >Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <label class="form-check-label">Already a Member ?<a href="{{route('loginpage')}}" style="text-decoration: none; color:black;"> Sign In</a></label>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
</div>

@endsection