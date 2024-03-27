@extends('Layouts.main')

@section('title','Edit Invoice')
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
     <form method="POST" action="{{route('invoice.put',['invoice'=>$invoice])}}">
         @csrf
         @method('put')
         <div class="row">
             <div class="col-8 offset-2">
                 <h1 class="text-center">Edit Invoice</h1>
                 <div class="form-froup">
                    <label>Invoice Number:</label>
                    <input type="text" class="form-control" name='invoice_no' value="{{$invoice->invoice_no}}" readonly/>
                 </div>
                 <div class="form-group">
                     <label>Customer:</label>
                     <select class="form-control" name="customer_id" disabled >
                         @foreach($customer as $customer)
                             <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="form-group">
                     <label>Item:</label>
                     <select class="form-control" name="task_id" >
                         @foreach($tasks as $task)
                             <option value="{{ $task->id }}">{{ $task->description }}</option>
                         @endforeach
                     </select>
                 </div>            
                 <div class="form-group">
                     <a href="{{route('invoicelist')}}" class="btn btn-info"><img src="https://cdn-icons-png.flaticon.com/512/709/709624.png" height="20px"></a>
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </div>
             </div>
         </div>
     </form>
 </div>
@endsection