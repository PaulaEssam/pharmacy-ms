@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Add Purchases</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Purchase</h5>
                        <form action="{{url('admin/purchases/add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Supplier Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" required class="form-control">
                                        <option value="">select Supplier Name --</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->suppliers_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Invoice ID <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="invoice_id" required class="form-control">
                                        <option value="">select Invoice ID--</option>
                                        @foreach($invoices as $invoice)
                                            <option value="{{$invoice->id}}">{{$invoice->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Voucher Number </label>
                                <div class="col-sm-10">
                                    <input type="text" name="voucher_number" class="form-control" placeholder="Enter Voucher Number" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Purchase Date <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="purchase_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Total Amount <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_amount" class="form-control" placeholder="Enter Total Amount " required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Payment Status <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="payment_status" required class="form-control">
                                            <option value="">select  payment status --</option>
                                            <option value="1">Pending</option>
                                            <option value="2">Accepted</option>
                                            <option value="3">Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-primary" value="Submit" >
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
