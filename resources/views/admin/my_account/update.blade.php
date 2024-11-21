@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Profile Updates</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile </h5>
                        <form action="{{url('admin/my_account')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Name <span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$getRecord->name}}">
                                    <span style="color:red">{{$errors->first('name')}}</span>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Email <span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$getRecord->email}}">
                                    <span style="color:red">{{$errors->first('email')}}</span>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-lable">Password </label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                    (leave blank if you are not changing the password)
                                    <span style="color:red">{{$errors->first('password')}}</span>
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
