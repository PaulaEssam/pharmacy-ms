@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Suppliers List</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/suppliers/add') }}" class="btn btn-primary">Add New Supplier</a>
                        </h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Supplier ID</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Supplier Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                <tr>
                                    <th scope="col">{{$loop->iteration}}</th>
                                    <td>{{$supplier->suppliers_name}}</td>
                                    <td>{{$supplier->suppliers_email}}</td>
                                    <td>{{$supplier->contact_number}}</td>
                                    <td>{{$supplier->address}}</td>
                                    <td>{{date('Y-m-d',strtotime($supplier->created_at))}}</td>
                                    <td>
                                        <a href="{{ url('admin/suppliers/edit/'.$supplier->id) }}" class="btn
                                            btn-primary">Edit</a>
                                            <a href="{{ url('admin/suppliers/delete/'.$supplier->id) }}" class="btn
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
