@extends('Layouts.main')


@section('title','Task Management')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-4">Task Management</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('homepage')}}" class="btn btn-info mb-2"><img src="https://cdn-icons-png.flaticon.com/512/709/709624.png" height="20px"></a>
            <a href="{{route('taskcreate')}}" class="btn btn-success mb-2">Add Task <img src="https://cdn-icons-png.flaticon.com/512/8861/8861125.png" height="20px"></a>
                <table class="table table-hover" border="1">
                    <thead class="thead-dark">
                    <tr>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Customer</th>
                        <th>Assignee</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->description}}</td>
                        <td> &#8377;{{$task->price}}</td>
                        <td>{{$task->customer->name}}</td>
                        <td>{{ \App\Models\User::find($task->assign)->name }}</td>
                        <td>{{$task->priority}}</td>
                        <td>{{$task->status}}</td>
                        <td>{{$task->duedate}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{route('task.edit',['task'=>$task])}}" class="mr-2"><img src="https://cdn-icons-png.flaticon.com/512/7257/7257795.png" height="28px"></a>
                                <form method="post" action="{{route('taskdelete',['task'=>$task])}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" value="delete" class="btn btn-sm"><img src="https://cdn-icons-png.flaticon.com/512/3286/3286176.png" height="28px"></button>
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
