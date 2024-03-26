@extends('Layouts.main')

@section('css')
<link rel="stylesheet" href="{{URL::asset('css/custCreate.css')}}"/>
@endsection

@section('title',' Create Customer')
@section('content')
<div class="container">
    <div class="mt-5">
        @if ($errors instanceof Illuminate\Support\ViewErrorBag && $errors->any())
            <div class="col">
                @foreach ($errors->all() as $error )
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif
    </div>
    <form method="POST" action="{{route('create.post')}}">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="text-center">Create Customer</h1>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <textarea class="form-control" name="address" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                    <label>Group:</label>
                    <select class="form-control" name="group">
                        <option value="" disabled selected >Select Group</option>
                        <option value="Sundry Debtors">Sundry Debtors</option>
                        <option value="Sundry Creditors">Sundry Creditors</option>
                    </select>
                </div>
                <div class="form-group form-check-inline">
                    <label>Registration Type:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="registrationtype" checked value="Regular">
                        <label class="form-check-label">Regular</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="registrationtype"  value="Unregistered">
                        <label class="form-check-label">Unregistered</label>
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{route('customerlist')}}" class="btn btn-info"><img src="https://cdn-icons-png.flaticon.com/512/709/709624.png" height="20px"></a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection