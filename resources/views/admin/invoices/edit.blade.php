@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Edit Invoices</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Invoices</h5>
                        <form action="{{url('admin/invoices/edit/'.$invoice->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Net Total <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="net_total" value="{{$invoice->net_total}}" class="form-control" placeholder="Enter net Total" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Invoices Date <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="invoices_date" value="{{$invoice->invoices_date}}" class="form-control" placeholder="Enter Invoices Date" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Customer Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="customer_id" required class="form-control">
                                        @foreach($customers as $customer)
                                            <option {{$invoice->customer_id == $customer->id ? 'selected' : ''}} value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Total Amount <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_amount" value="{{$invoice->total_amount}}" class="form-control" placeholder="Enter Total Amount" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Total Discount <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_discount" value="{{$invoice->total_discount}}" class="form-control" placeholder="Enter Total Discount" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-primary"  value="Update" >
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
