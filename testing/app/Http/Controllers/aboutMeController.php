<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class aboutMeController extends Controller
{
    public function index(){

        $customers=Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create(){
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create',compact('companies','customer'));
    }

    public function store(){ //找到function
        Customer::create($this->validateRequest());

        return redirect('aboutMe');
    }

    public function show(Customer $customer){
        //$customer = Customer::where('id', $customer)->firstOrFail();
        //dd($aboutMe);

        return view('customers.show',compact('customer'));
    }

    public function edit(Customer $customer){
        $companies = Company::all();

        return view('customers.edit',compact('customer','companies'));
    }

    public function update(Customer $customer){

        $customer->update($this->validateRequest());

        return redirect('aboutMe/'.$customer->id);
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect('aboutMe');
    }

    public function validateRequest(){
        return request()->validate([ //從view 過來接資料
            'name'=>'required|min:3',
            'email'=>'required|email',
            'active'=>'required',
            'company_id' =>'required',
        ]);
    }
}
