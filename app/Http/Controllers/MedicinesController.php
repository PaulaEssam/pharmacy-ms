<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use App\Models\MedicinesStock;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{
    public function medicines()
    {
        $data['meta_title'] = 'Medicines' ;
        $data['medicines'] = Medicines::all();
        return view('admin.medicines.list',$data);
    }

    public function add_medicines()
    {
        $data['meta_title'] = 'Medicines' ;
        return view('admin.medicines.add',$data);
    }
    public function insert_medicines(Request $request)
    {
        $medicine = new Medicines();
        $medicine->name = trim($request->name);
        $medicine->packing = trim($request->packing);
        $medicine->generic_name = trim($request->generic_name);
        $medicine->supplier_name = trim($request->supplier_name);
        $medicine->save();
        return redirect('admin/medicines')->with('success', 'Medicine Added Successfully');
    }
    public function edit_medicines($id)
    {
        $data['meta_title'] = 'Medicine' ;
        $data['medicine'] = Medicines::find($id);
        return view('admin.medicines.edit',$data);

    }

    public function update_medicines(Request $request , $id)
    {
        $medicine = Medicines::find($id);
        $medicine->name = trim($request->name);
        $medicine->packing = trim($request->packing);
        $medicine->generic_name = trim($request->generic_name);
        $medicine->supplier_name = trim($request->supplier_name);
        $medicine->save();
        return redirect('admin/medicines')->with('success', 'Medicine Updated Successfully');
    }

    public function delete_medicines($id)
    {
        $medicine = Medicines::find($id);
        $medicine->delete();
        return redirect('admin/medicines')->with('success', 'Medicine Deleted Successfully');
    }

    public function medicines_stock_list()
    {
        $data['meta_title'] = 'Medicine Stock' ;
        $data['medicines_stock'] = MedicinesStock::all();
        return view('admin.medicines_stock.list',$data);
    }

    public function medicines_stock_add()
    {
        $data['meta_title'] = 'Medicine Stock' ;
        $data['medicines'] = Medicines::all();
        return view('admin.medicines_stock.add',$data);
    }
    public function medicines_stock_insert(Request $request)
    {
        $medicine_stock = new MedicinesStock();
        $medicine_stock->medicine_id = $request->medicine_id;
        $medicine_stock->batch_id = $request->batch_id;
        $medicine_stock->expiry_date = $request->expiry_date;
        $medicine_stock->quantity = $request->quantity;
        $medicine_stock->mrp = $request->mrp;
        $medicine_stock->rate = $request->rate;
        $medicine_stock->save();
        return redirect('admin/medicines_stock')->with('success', 'Medicine Stock Added Successfully');
    }

    public function edit_medicines_stock($id)
    {
        $data['meta_title'] = 'Medicine Stock' ;
        $data['medicine'] = MedicinesStock::find($id);
        $data['medicines'] = Medicines::all();
        return view('admin.medicines_stock.edit',$data);

    }

    public function update_medicines_stock(Request $request , $id)
    {
        $medicine_stock = MedicinesStock::find($id);
        $medicine_stock->medicine_id = $request->medicine_id;
        $medicine_stock->batch_id = $request->batch_id;
        $medicine_stock->expiry_date = $request->expiry_date;
        $medicine_stock->quantity = $request->quantity;
        $medicine_stock->mrp = $request->mrp;
        $medicine_stock->rate = $request->rate;
        $medicine_stock->save();
        return redirect('admin/medicines_stock')->with('success', 'Medicine Stock Updated Successfully');
    }

    public function delete_medicines_stock($id)
    {
        $medicine = MedicinesStock::find($id);
        $medicine->delete();
        return redirect('admin/medicines_stock')->with('success', 'Medicine Stock Deleted Successfully');
    }
}
