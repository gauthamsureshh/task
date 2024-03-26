<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    #fn to list all the customer in db
    public function customerList(){
        $customers=Customer::all();
        return view('Customer.list',['customer'=>$customers]);
    }

    #fn to render Customer Creation Page
    public function customerCreate(){
        return view('Customer.create');
    }

    #fn to store the new customer details in db
    public function customerStore(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'registrationtype'=>'required',
            'group'=>'required'
        ]);

        Customer::create($data);
        toastr()->success('Customer Added Successfully');
        return redirect(route('customerlist'));
    }

    #fn to render Customer Edit Page
    public function customerEdit(Customer $customer){
        return view('Customer.edit',['customer'=>$customer]);
    }

    #fn to edit the existing customer details
    public function customerUpdate(Customer $customer, Request $request){
        $data=$request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'registrationtype'=>'required',
            'group'=>'required'
        ]);

        $customer->update($data);

        toastr()->success('Customer Editted Successfully');
        return redirect(route('customerlist'));
    }

    #fn to delete existiing customer
    public function customerDestroy(Customer $customer){
        $customer->delete();
        toastr()->warning('Customer Deleted');
        return redirect(route('customerlist'));
    }
}
