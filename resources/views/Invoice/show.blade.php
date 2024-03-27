@extends('Layouts.main')

@section('title','View Invoice')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-4">Invoice</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
                <table class="table table-hover" border="1">
                    <thead class="thead-dark">
                    <tr>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Item</th>
                        <th>Date</th>
                        <th>Item Price</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>Total Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$invoice->invoice_no}}</td>
                        <td>{{ \App\Models\Customer::find($invoice->customer_id)->name }}</td>
                        <td>{{ \App\Models\Task::find($invoice->task_id)->description }}</td>
                        <td>{{$invoice->date}}</td>
                        <td>{{$invoice->taxvalue}}</td>
                        <td>{{$invoice->cgst}}</td>
                        <td>{{$invoice->sgst}}</td>
                        <td>{{$invoice->total}}</td>
                    </tr>
                    </tbody>
                </table>  
        </div>
    </div>
    <div class="text-center">
        <button onclick="window.print()" class="btn btn-primary mb-2"><img src="https://cdn-icons-png.flaticon.com/512/446/446991.png" height="28px"></button>
        <a href="{{route('invoicelist')}}" class="btn btn-info mb-2"><img src="https://cdn-icons-png.flaticon.com/512/709/709624.png" height="28px"></a>
    </div>
</div>
@endsection