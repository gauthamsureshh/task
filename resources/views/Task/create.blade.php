@extends('Layouts.main')


@section('title','Create Task')
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
    <form method="POST" action="{{route('taskcreate.post')}}" >
        @csrf
        @method('post')
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="text-center">Create Task</h1>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" required>
                </div>
                <div class="form-group">
                    <label>Customer:</label>
                    <select class="form-control" name="customer_id" required>
                        <option value="" disabled selected >Select Customer</option>
                        @foreach($customer as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Assign To:</label>
                    <select class="form-control" name="assign" required>
                        <option value="" disabled selected >Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-check-inline">
                    <label>Priority:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority" checked value="Low">
                        <label class="form-check-label">Low</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority"  value="Medium">
                        <label class="form-check-label">Medium</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority"  value="High">
                        <label class="form-check-label">High</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status:</label>
                    <select class="form-control" name="status" required>
                        <option value="" disabled selected >Select Status</option>
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Due Date:</label>
                    <input type="date" class="form-control" name="duedate" placeholder="DueDate" required>
                </div>
                <div class="form-group">
                    <a href="{{route('tasklist')}}" class="btn btn-info"><img src="https://cdn-icons-png.flaticon.com/512/709/709624.png" height="20px"></a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
