<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchaseController;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class,'login']);
Route::get('forgot-password',[AuthController::class,'forgot_password']);
Route::post('login_post',[AuthController::class, 'login_post']);
Route::post('forgot-post',[AuthController::class, 'forgot_post']);
Route::get('reset/{token}',[AuthController::class,'get_reset']);
Route::post('reset/{token}',[AuthController::class,'post_reset']);
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('admin/customers',[CustomersController::class,'customers']);
    Route::get('admin/customers/add',[CustomersController::class,'add_customers']);
    Route::post('admin/customers/add',[CustomersController::class,'insert_customers']);
    Route::get('admin/customers/edit/{id}',[CustomersController::class,'edit_customers']);
    Route::post('admin/customers/update/{id}',[CustomersController::class,'update_customers']);
    Route::get('admin/customers/delete/{id}',[CustomersController::class,'delete_customers']);
    // medicines start
    Route::get('admin/medicines',[MedicinesController::class, 'medicines']);
    Route::get('admin/medicines/add',[MedicinesController::class, 'add_medicines']);
    Route::post('admin/medicines/add',[MedicinesController::class, 'insert_medicines']);
    Route::get('admin/medicines/edit/{id}',[MedicinesController::class,'edit_medicines']);
    Route::post('admin/medicines/update/{id}',[MedicinesController::class,'update_medicines']);
    Route::get('admin/medicines/delete/{id}',[MedicinesController::class,'delete_medicines']);
    // medicines end
    Route::get('admin/medicines_stock', [MedicinesController::class, 'medicines_stock_list']);
    Route::get('admin/medicines_stock/add', [MedicinesController::class, 'medicines_stock_add']);
    Route::post('admin/medicines_stock/add', [MedicinesController::class, 'medicines_stock_insert']);
    Route::get('admin/medicines_stock/edit/{id}',[MedicinesController::class,'edit_medicines_stock']);
    Route::post('admin/medicines_stock/update/{id}',[MedicinesController::class,'update_medicines_stock']);
    Route::get('admin/medicines_stock/delete/{id}',[MedicinesController::class,'delete_medicines_stock']);
    // suppliers start
    Route::get('admin/suppliers',[SupplierController::class,'index']);
    Route::get('admin/suppliers/add',[SupplierController::class,'add']);
    Route::post('admin/suppliers/add',[SupplierController::class,'insert']);
    Route::get('admin/suppliers/edit/{id}',[SupplierController::class,'edit']);
    Route::post('admin/suppliers/edit/{id}',[SupplierController::class,'update']);
    Route::get('admin/suppliers/delete/{id}',[SupplierController::class,'delete']);
    // invoices start
    Route::get('admin/invoices',[InvoiceController::class,'index']);
    Route::get('admin/invoices/add',[InvoiceController::class,'add']);
    Route::post('admin/invoices/add',[InvoiceController::class,'insert']);
    Route::get('admin/invoices/edit/{id}',[InvoiceController::class,'edit']);
    Route::post('admin/invoices/edit/{id}',[InvoiceController::class,'update']);
    Route::get('admin/invoices/delete/{id}',[InvoiceController::class,'delete']);
    // purchases start
    Route::get('admin/purchases',[PurchaseController::class,'index']);
    Route::get('admin/purchases/add',[PurchaseController::class,'add']);
    Route::post('admin/purchases/add',[PurchaseController::class,'insert']);
    Route::get('admin/purchases/edit/{id}',[PurchaseController::class,'edit']);
    Route::post('admin/purchases/edit/{id}',[PurchaseController::class,'update']);
    Route::get('admin/purchases/delete/{id}',[PurchaseController::class,'delete']);
    // my_account start
    Route::get('admin/my_account',[DashboardController::class,'my_account']);
    Route::post('admin/my_account',[DashboardController::class,'my_account_update']);

});
Route::get('logout',[AuthController::class,'logout']);
