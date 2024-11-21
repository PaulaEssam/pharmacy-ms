@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Medicines Stock List</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/medicines_stock/add') }}" class="btn btn-primary">Add New Medicine Stock</a>
                        </h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Medicine ID</th>
                                    <th scope="col">Medicine Stock Name</th>
                                    <th scope="col">Batch ID</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">MRP</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medicines_stock as $medicine)
                                <tr>
                                    <th scope="col">{{$loop->iteration}}</th>
                                    <td>{{$medicine->medicineName->name}}</td>
                                    <td>{{$medicine->batch_id}}</td>
                                    <td>{{$medicine->expiry_date}}</td>
                                    <td>{{$medicine->quantity}}</td>
                                    <td>{{$medicine->mrp}}</td>
                                    <td>{{$medicine->rate}}</td>
                                    <td>{{date('Y-m-d',strtotime($medicine->created_at))}}</td>
                                    <td>
                                        <a href="{{ url('admin/medicines_stock/edit/'.$medicine->id) }}" class="btn
                                            btn-primary">Edit</a>
                                            <a href="{{ url('admin/medicines_stock/delete/'.$medicine->id) }}" class="btn
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
