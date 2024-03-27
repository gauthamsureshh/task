<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    #fn to list all the tasks in db
    public function taskList(){
        $tasks=Task::all();
        return view('Task.list',compact('tasks'));
    }

    #fn to render Task Creation Page
    public function taskCreate(){
        $customer=Customer::all();
        $users=User::all();
        return view('Task.create',compact('customer','users'));
    }

    #fn to store new tasks to db
    public function taskStore(Request $request){
        $data=$request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description'=>'required',
            'price'=>'required',
            'assign'=>'required',
            'priority'=>'required',
            'status'=>'required',
            'duedate'=>'required|date'
        ]);
       
        Task::create($data);
        toastr()->success('Task Added Successfully');
        return redirect(route('tasklist'));
    }

    #fn to render Task Edit Page
    public function taskEdit(Task $task){
        $customer=Customer::all();
        $users=User::all();
        return view('Task.edit',compact('task','customer','users'));
    }

    #fn to edit the existing task details
    public function taskUpdate(Task $task, Request $request){
        $data=$request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description'=>'required',
            'price'=>'required',
            'assign'=>'required',
            'priority'=>'required',
            'status'=>'required',
            'duedate'=>'required|date'
        ]);

        $task->update($data);

        toastr()->success('Task Editted Successfully');
        return redirect(route('tasklist'));
    }

    #fn to delete existing task
    public function taskDestroy(Task $task){
        $task->delete();
        toastr()->warning('Task Deleted');
        return redirect(route('tasklist'));
    }
}
