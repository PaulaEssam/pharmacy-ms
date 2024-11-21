@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Customers List</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/customers/add') }}" class="btn btn-primary">Add New Customer</a>
                        </h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Customer ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Dr.Name</th>
                                    <th scope="col">Dr.Address</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr>
                                    <th scope="col">{{$loop->iteration}}</th>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->contact_number}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->doctor_name}}</td>
                                    <td>{{$customer->doctor_address}}</td>
                                    <td>{{date('Y-m-d',strtotime($customer->created_at))}}</td>
                                    <td>
                                        <a href="{{ url('admin/customers/edit/'.$customer->id) }}" class="btn
                                            btn-primary">Edit</a>
                                            <a href="{{ url('admin/customers/delete/'.$customer->id) }}" class="btn
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
