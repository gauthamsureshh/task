@extends('Layouts.main')

@section('title','Invoice Management')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-4">Invoice Management</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('homepage')}}" class="btn btn-info mb-2"><img src="https://cdn-icons-png.flaticon.com/512/709/709624.png" height="20px"></a>
            <a href="{{route('invoicecreate')}}" class="btn btn-success mb-2">Generate Invoice <img src="https://cdn-icons-png.flaticon.com/512/8861/8861125.png" height="20px"></a>
                <table class="table table-hover" border="1">
                    <thead class="thead-dark">
                    <tr>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Item</th>
                        <th>Total Cost</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoice as $invoice)
                    <tr>
                        <td>{{$invoice->invoice_no}}</td>
                        <td>{{ \App\Models\Customer::find($invoice->customer_id)->name }}</td>
                        <td>{{ \App\Models\Task::find($invoice->task_id)->description }}</td>
                        <td>{{$invoice->total}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{route('invoiceshow',['invoice'=>$invoice->id])}}" class="mr-2"><img src="https://cdn-icons-png.flaticon.com/512/1265/1265775.png" height="28px"></a>
                                <a href="{{route('invoice.edit',['invoice'=>$invoice])}}" class="mr-2"><img src="https://cdn-icons-png.flaticon.com/512/7073/7073677.png" height="28px"></a>
                                <form method="post" action="{{route('invoicedelete',['invoice'=>$invoice])}}">
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