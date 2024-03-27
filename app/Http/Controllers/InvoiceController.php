<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    #fn to render invoice page
    public function invoiceList()
    {
        $invoice=Invoice::all();
        return view('Invoice.list',compact('invoice'));
    }

    #fn to render Invoice Creation Page
    public function invoiceCreate()
    {
        $customer=Customer::all();
        $tasks=Task::all();
        return view('Invoice.create',compact('customer','tasks'));
    }

    #fn to store invoices
    public function invoiceStore(Request $request){
        $request->validate([
            'customer_id'=>'required',
            'task_id'=>'required'
        ]);

        $task=Task::findorFail($request->task_id);
        $taskrate=$task->price;
        
        #calculate CGST,SGST,TOTAL
        $cgst=$taskrate * 0.09;
        $sgst=$taskrate * 0.09;
        $total=$taskrate + $cgst + $sgst;

        Invoice::create([
            'invoice_no'=>$this->generateInvoiceNo(),
            'date'=>now(),
            'customer_id'=>$request->customer_id,
            'task_id'=>$request->task_id,
            'taxvalue'=>$taskrate,
            'cgst'=>$cgst,
            'sgst'=>$sgst,
            'total'=>$total
        ]);

        toastr()->success('Invoice Generated');
        return redirect(route('invoicelist'));
    }
    private function generateInvoiceNo(){
        return random_int(1000,9999);
    }
    
    #fn to render Edit Page of Invoice
    public function invoiceEdit(Invoice $invoice){
        $customer=Customer::all();
        $tasks=Task::all();
        return view('Invoice.edit',compact('invoice','customer','tasks'));
    }

    #fn to edit existing invoice
    public function invoiceUpdate(Invoice $invoice, Request $request){
        $invoice->update([
            'invoice_no' => $request->invoice_no,
            'task_id' => $request->task_id,
            // 'taxvalue' => $request->price,
            // 'cgst' => $request->price * 0.09, 
            // 'sgst' => $request->price * 0.09,
            // 'total' => $request->taxprice + ($request->price * 0.09) + ($request->price * 0.09)
        ]);
        toastr()->success('Invoice Modified');
        return redirect(route('invoicelist'));
    }

    #fn to delete existing invoice
    public function invoiceDestroy(Invoice $invoice){
        $invoice->delete();
        toastr()->warning('Invoice Deleted');
        return redirect(route('invoicelist'));
    }

    #fn to show a particular invoice
    public function invoiceShow(Invoice $invoice){
        if(!$invoice){
            toastr()->error('Invoice Not Found');
            return redirect(route('invoicelist'));
        }
        $invoice->load('customer','task');
        return view('Invoice.show',compact('invoice'));
    }

}
