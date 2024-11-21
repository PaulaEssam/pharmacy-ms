<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Invoice;
use App\Models\Medicines;
use App\Models\MedicinesStock;
use App\Models\Purchases;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['totalCustomer'] = Customers::count();
        $data['totalMedicines'] = Medicines::count();
        $data['totalMedicinesStock'] = MedicinesStock::count();
        $data['totalSupplier'] = Supplier::count();
        $data['totalInvoice'] = Invoice::count();
        $data['totalPurchases'] = Purchases::count();
        $data['meta_title'] = 'Dashboard' ;
        return view('admin.dashboard.list',$data);
    }

    public function my_account()
    {
        $data['meta_title'] = 'My Account' ;

        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.my_account.update',$data);
    }

    public function my_account_update(Request $request)
    {
        $save = User::find(Auth::user()->id);
        $save->name = $request->name;
        $save->email = $request->email;
        if($request->password){
            $save->password = Hash::make($request->password);
        }
        $save->save();
        return redirect()->back()->with('success','Account Updated Successfully');

    }
}
