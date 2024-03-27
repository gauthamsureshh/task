@extends('Layouts.main')

@section('css')
<link rel="stylesheet" href="{{URL::asset('css/auth.css')}}"/>
@endsection

@section('title','Edit Profile')
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
        <form method="post" action="{{route('userupdate.put',['user'=>auth()->user()->id])}}" class="mr-auto ml-auto mt-3" style="width: 500px">
            @csrf
            @method('put')
            <div class="form-group">
                <label >Username</label>
                <input type="text" class="form-control" placeholder="Username" name="name" value="{{auth()->user()->name}}" readonly>
            </div>
            <div class="form-group">
                <label >Email Address</label>
                <input type="email" class="form-control"   placeholder="Email" name="email" value="{{auth()->user()->email}}">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
</div>

@endsection