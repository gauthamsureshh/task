<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    #fn to render invoice page
    public function invoiceList()
    {
        return view('Invoice.list');
    }

    #fn to render Invoice Creation Page
    public function invoiceCreate()
    {
        return view('Invoice.create');
    }

}
