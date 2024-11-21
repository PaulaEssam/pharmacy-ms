@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Medicines List</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/medicines/add') }}" class="btn btn-primary">Add New Medicine</a>
                        </h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Medicine ID</th>
                                    <th scope="col">Medicine Name</th>
                                    <th scope="col">Packing</th>
                                    <th scope="col">Generic Name</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medicines as $medicine)
                                <tr>
                                    <th scope="col">{{$loop->iteration}}</th>
                                    <td>{{$medicine->name}}</td>
                                    <td>{{$medicine->packing}}</td>
                                    <td>{{$medicine->generic_name}}</td>
                                    <td>{{$medicine->supplier_name}}</td>
                                    <td>{{date('Y-m-d',strtotime($medicine->created_at))}}</td>
                                    <td>
                                        <a href="{{ url('admin/medicines/edit/'.$medicine->id) }}" class="btn
                                            btn-primary">Edit</a>
                                            <a href="{{ url('admin/medicines/delete/'.$medicine->id) }}" class="btn
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
