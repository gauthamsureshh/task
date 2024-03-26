@extends('Layouts.main')

@section('css')
<link rel="stylesheet" href="{{URL::asset('css/custCreate.css')}}"/>
@endsection

@section('title',' Edit Customer')
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
    <form method="post" action="{{route('update.put',['customer'=>$customer])}}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="text-center">Edit Customer</h1>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$customer->name}}">
                </div>
                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{$customer->phone}}">
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <textarea class="form-control" name="address" placeholder="Address">{{$customer->address}}</textarea>
                </div>
                <div class="form-group">
                    <label>Group:</label>
                    <select class="form-control" name="group">
                        <option value="" disabled selected >Select Group</option>
                        <option value="Sundry Debtors" {{$customer->group == 'Sundry Debtors' ? 'selected' : ''}}>Sundry Debtors</option>
                        <option value="Sundry Creditors" {{$customer->group == 'Sundry Creditors' ? 'selected' : ''}}>Sundry Creditors</option>
                    </select>
                </div>
                <div class="form-group form-check-inline">
                    <label>Registration Type:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="registrationtype"  value="Regular" {{ $customer->registrationtype == 'Regular' ? 'checked' : '' }}>
                        <label class="form-check-label">Regular</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="registrationtype"  value="Unregistered" {{ $customer->registrationtype == 'Unregistered' ? 'checked' : '' }}>
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