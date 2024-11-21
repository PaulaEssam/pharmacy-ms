<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $data['meta_title'] = 'Supplier' ;

        $data['suppliers'] = Supplier::all();
        return view('admin.suppliers.list',$data);
    }
    public function add()
    {
        $data['meta_title'] = 'Supplier' ;

        return view('admin.suppliers.add',$data);
    }
    public function insert(Request $request)
    {
        $supllier = new Supplier();
        $supllier->suppliers_name = trim($request->suppliers_name);
        $supllier->suppliers_email = trim($request->suppliers_email);
        $supllier->contact_number = trim($request->contact_number);
        $supllier->address = trim($request->address);
        $supllier->save();
        return redirect('admin/suppliers')->with('success','Supplier Added Successfully');
    }
    public function edit($id)
    {
        $data['meta_title'] = 'Supplier' ;

        $data['supplier'] = Supplier::find($id);
        return view('admin.suppliers.edit',$data);
    }
    public function update(Request $request,$id)
    {
        $supllier = Supplier::find($id);
        $supllier->suppliers_name = trim($request->suppliers_name);
        $supllier->suppliers_email = trim($request->suppliers_email);
        $supllier->contact_number = trim($request->contact_number);
        $supllier->address = trim($request->address);
        $supllier->save();
        return redirect('admin/suppliers')->with('success','Supplier Updated Successfully');
    }

    public function delete($id)
    {
        $supllier = Supplier::find($id);
        $supllier->delete();
        return redirect('admin/suppliers')->with('success','Supplier Deleted Successfully');
    }
}
