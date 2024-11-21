@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Purchases List</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/purchases/add') }}" class="btn btn-primary">Add New Purchase</a>
                        </h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Invoice ID Number</th>
                                    <th scope="col">Voucher Number</th>
                                    <th scope="col">Purchase Date</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchases as $purchase)
                                <tr>
                                    <th scope="col">{{$loop->iteration}}</th>
                                    <td>{{$purchase->getSupplierName->suppliers_name }}</td>
                                    <td>{{$purchase->invoice_id }}</td>
                                    <td>{{$purchase->voucher_number}}</td>
                                    <td>{{$purchase->purchase_date}}</td>
                                    <td>{{$purchase->total_amount}}</td>
                                    <td>@if($purchase->payment_status == 1) Pending @elseif($purchase->payment_status == 2) Accepted @else Canceled @endif</td>
                                    <td>{{date('Y-m-d',strtotime($purchase->created_at))}}</td>
                                    <td>
                                        <a href="{{ url('admin/purchases/edit/'.$purchase->id) }}" class="btn
                                            btn-primary">Edit</a>
                                            <a href="{{ url('admin/purchases/delete/'.$purchase->id) }}" class="btn
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
