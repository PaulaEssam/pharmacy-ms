<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function customers()
    {
        $data['meta_title'] = 'Customers' ;

        $data['customers'] = Customers::all();
        return view('admin.customers.list',$data);
    }

    public function add_customers()
    {
        $data['meta_title'] = 'Customers' ;
        return view('admin.customers.add',$data);
    }

    public function insert_customers(Request $request)
    {
        $customer = new Customers();
        $customer->name = trim($request->name); // trim()لو فيه مسافة ف اول اكلمة او اخرها بتشيلها
        $customer->contact_number = trim($request->contact_number);
        $customer->address = trim($request->address);
        $customer->doctor_name = trim($request->doctor_name);
        $customer->doctor_address = trim($request->doctor_address);
        $customer->save();
        return redirect('admin/customers')->with('success', 'Customer Added Successfully');

    }

    public function edit_customers($id)
    {
        $data['meta_title'] = 'Customers' ;

        $data['customer'] = Customers::find($id);
        return view('admin.customers.edit',$data);

    }

    public function update_customers(Request $request , $id)
    {
        $customer = Customers::find($id);
        $customer->name = trim($request->name);
        $customer->contact_number = trim($request->contact_number);
        $customer->address = trim($request->address);
        $customer->doctor_name = trim($request->doctor_name);
        $customer->doctor_address = trim($request->doctor_address);
        $customer->save();
        return redirect('admin/customers')->with('success', 'Customer Updated Successfully');
    }

    public function delete_customers($id)
    {
        $customer = Customers::find($id);
        $customer->delete();
        return redirect('admin/customers')->with('success', 'Customer Deleted Successfully');
    }
}
