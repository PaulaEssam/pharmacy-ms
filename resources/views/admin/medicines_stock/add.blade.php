@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Add Medicines stock</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medicines stock</h5>
                        <form action="{{url('admin/medicines_stock/add')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="medicine_id" class="form-control" required>
                                        <option value="">Select Medicine Name --</option>
                                        @foreach($medicines as $medicine)
                                            <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Batch Id </label>
                                <div class="col-sm-10">
                                    <input type="text" name="batch_id" class="form-control" placeholder="Enter Batch Id" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Expir Date </label>
                                <div class="col-sm-10">
                                    <input type="date" name="expiry_date" class="form-control"  >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Quantity <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">MRP<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="mrp" class="form-control" placeholder="Enter MRP" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Rate<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="rate" class="form-control"  required placeholder="Enter Rate" >
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
