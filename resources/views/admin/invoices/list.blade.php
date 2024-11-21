@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Invoices List</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/invoices/add') }}" class="btn btn-primary">Add New Invoice</a>
                        </h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Invoice ID</th>
                                    <th scope="col">Net Total</th>
                                    <th scope="col">Invoices Date</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Total Discount</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                <tr>
                                    <th scope="col">{{$loop->iteration}}</th>
                                    <td>{{$invoice->net_total}}</td>
                                    <td>{{$invoice->invoices_date}}</td>
                                    <td>{{$invoice->getCustomerName->name }}</td>
                                    <td>{{$invoice->total_amount}}</td>
                                    <td>{{$invoice->total_discount}}</td>
                                    <td>{{date('Y-m-d',strtotime($invoice->created_at))}}</td>
                                    <td>
                                        <a href="{{ url('admin/invoices/edit/'.$invoice->id) }}" class="btn
                                            btn-primary">Edit</a>
                                            <a href="{{ url('admin/invoices/delete/'.$invoice->id) }}" class="btn
                                                btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
