@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Edit Medicines</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medicines</h5>
                        <form action="{{url('admin/medicines/update/'.$medicine->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required value="{{$medicine->name}}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Packing <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="packing" class="form-control" placeholder="Enter Packing" required  value="{{$medicine->packing}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Generic Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="generic_name" class="form-control" placeholder="Enter Doctor Generic Name" required value="{{$medicine->generic_name}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Supplier Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="supplier_name" class="form-control" placeholder="Enter Supplier Name" required value="{{$medicine->supplier_name}}">
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
