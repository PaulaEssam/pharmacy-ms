<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $data['meta_title'] = 'Invoices' ;
        $data['invoices'] = Invoice::all();
        return view('admin.invoices.list',$data);
    }
    public function add()
    {
        $data['meta_title'] = 'Invoices' ;
        $data['customers'] = Customers::all();
        return view('admin.invoices.add',$data);
    }
    public function insert(Request $request)
    {
        $invoice = new Invoice();
        $invoice->net_total = $request->net_total;
        $invoice->invoices_date = $request->invoices_date;
        $invoice->customer_id = $request->customer_id;
        $invoice->total_amount = $request->total_amount;
        $invoice->total_discount = $request->total_discount;
        $invoice->save();
        return redirect('admin/invoices')->with('success','Invoice Added Successfully');

    }
    public function edit($id)
    {
        $data['meta_title'] = 'Invoices' ;

        $data['invoice'] = Invoice::find($id);
        $data['customers'] = Customers::all();
        return view('admin.invoices.edit',$data);
    }
    public function update(Request $request,$id)
    {
        $invoice = Invoice::find($id);
        $invoice->net_total = $request->net_total;
        $invoice->invoices_date = $request->invoices_date;
        $invoice->customer_id = $request->customer_id;
        $invoice->total_amount = $request->total_amount;
        $invoice->total_discount = $request->total_discount;
        $invoice->save();
        return redirect('admin/invoices')->with('success','Invoice Updated Successfully');
    }

    public function delete($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect('admin/invoices')->with('success','Invoice Deleted Successfully');
    }
}
