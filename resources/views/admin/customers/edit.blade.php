@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Edit Customer</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Customer</h5>
                        <form action="{{url('admin/customers/update/'.$customer->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{$customer->name}}" class="form-control" placeholder="Enter Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Contact Number <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="contact_number" value="{{$customer->contact_number}}" class="form-control" placeholder="Enter Contact Number" required min="0">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Address </label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" value="{{$customer->address}}" class="form-control" placeholder="Enter Address" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Doctor Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="doctor_name"  value="{{$customer->doctor_name}}" class="form-control" placeholder="Enter Doctor Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Doctor Address </label>
                                <div class="col-sm-10">
                                    <input type="text" name="doctor_address"  value="{{$customer->doctor_address}}" class="form-control" placeholder="Enter Doctor Address" >
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
