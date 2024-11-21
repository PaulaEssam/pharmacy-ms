@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Edit Purchases</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Purchase</h5>
                        <form action="{{url('admin/purchases/edit/'.$purchase->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Supplier Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" required class="form-control">
                                        @foreach($suppliers as $supplier)
                                            <option {{$purchase->supplier_id == $supplier->id ? 'selected' : ''}} value="{{$supplier->id}}">{{$supplier->suppliers_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Invoice ID <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="invoice_id" required class="form-control">
                                        @foreach($invoices as $invoice)
                                            <option {{$purchase->invoice_id == $invoice->id ? 'selected' : ''}} value="{{$invoice->id}}">{{$invoice->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Voucher Number </label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$purchase->voucher_number}}" name="voucher_number" class="form-control" placeholder="Enter Voucher Number" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Purchase Date <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" value="{{$purchase->purchase_date}}" name="purchase_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Total Amount <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$purchase->total_amount}}" name="total_amount" class="form-control" placeholder="Enter Total Amount " required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Payment Status <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="payment_status" required class="form-control">
                                            <option {{$purchase->payment_status == 1 ? 'selected' : ''}} value="1">Pending</option>
                                            <option {{$purchase->payment_status == 2 ? 'selected' : ''}} value="2">Accepted</option>
                                            <option {{$purchase->payment_status == 3 ? 'selected' : ''}} value="3">Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-primary" value="Update" >
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
