@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Add Supplier</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Supplier</h5>
                        <form action="{{url('admin/suppliers/add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="suppliers_name" class="form-control" placeholder="Enter Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Email <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" name="suppliers_email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Contact Number <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="contact_number" class="form-control" placeholder="Enter Contact Number" required min="0">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Address </label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" >
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
