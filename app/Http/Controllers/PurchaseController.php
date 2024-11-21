<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Purchases;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $data['meta_title'] = 'Purchase' ;

        $data['purchases'] = Purchases::all();
        return view('admin.purchases.list',$data);
    }
    public function add()
    {
        $data['meta_title'] = 'Purchase' ;

        $data['suppliers'] = Supplier::all();
        $data['invoices'] = Invoice::all();
        return view('admin.purchases.add',$data);

    }
    public function insert(Request $request)
    {
        $purchase = new Purchases();
        $purchase->supplier_id = $request->supplier_id;
        $purchase->invoice_id = $request->invoice_id;
        $purchase->voucher_number = $request->voucher_number;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->total_amount = $request->total_amount;
        $purchase->payment_status = $request->payment_status;
        $purchase->save();
        return redirect('admin/purchases')->with('success','Purchase Added Successfully');
    }
    public function edit($id)
    {
        $data['meta_title'] = 'Purchase' ;

        $data['purchase'] = Purchases::find($id);
        $data['suppliers'] = Supplier::all();
        $data['invoices'] = Invoice::all();
        return view('admin.purchases.edit',$data);
    }
    public function update(Request $request,$id)
    {
        $purchase = Purchases::find($id);
        $purchase->supplier_id = $request->supplier_id;
        $purchase->invoice_id = $request->invoice_id;
        $purchase->voucher_number = $request->voucher_number;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->total_amount = $request->total_amount;
        $purchase->payment_status = $request->payment_status;
        $purchase->save();
        return redirect('admin/purchases')->with('success','Purchase Updated Successfully');
    }

    public function delete($id)
    {
        $purchase = Purchases::find($id);
        $purchase->delete();
        return redirect('admin/purchases')->with('success','Purchase Deleted Successfully');
    }
}
