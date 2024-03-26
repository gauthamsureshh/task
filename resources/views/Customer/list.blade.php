@extends('Layouts.main')

@section('title','Customer Management')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-4">Customer Management</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('homepage')}}" class="btn btn-info mb-2"><img src="https://cdn-icons-png.flaticon.com/512/709/709624.png" height="20px"></a>
            <a href="{{route('customercreate')}}" class="btn btn-success mb-2">Add Customer <img src="https://cdn-icons-png.flaticon.com/512/8861/8861125.png" height="20px"></a>
                <table class="table" border="1">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Group</th>
                        <th>Registration Type</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->group}}</td>
                        <td>{{$customer->registrationtype}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{route('customeredit',['customer'=>$customer])}}" class="mr-2"><img src="https://cdn-icons-png.flaticon.com/512/8188/8188338.png" height="28px"></a>
                                <form method="post" action="{{route('customerdelete',['customer'=>$customer])}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" value="delete" class="btn btn-sm"><img src="https://cdn-icons-png.flaticon.com/512/748/748138.png" height="20px"></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>  
        </div>
    </div>
</div>
@endsection