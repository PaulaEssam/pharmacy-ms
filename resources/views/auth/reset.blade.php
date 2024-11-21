
@extends('layouts.app')
@section('content')
    {{-- start login --}}
    <div class="card mb-3">
        <div class="card-body">
            <div class="pt-4 pb-2">
                @include('message')
            <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
            <p class="text-center small">Enter your Password & Confirm it</p>
            </div>

            <form method="POST" action="{{url('reset/'.$token)}}" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                    <label class="form-label">Password</label>
                    <div class="input-group has-validation">
                    <input type="password" name="password" class="form-control" required>

                    <span style="color: red">{{$errors->first('password')}}</span>

                    <div class="invalid-feedback">Please enter your password.</div>
                    </div>
                </div>

                <div class="col-12">
                    <label  class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" required>

                    <span style="color: red">{{$errors->first('cpassword')}}</span>

                    <div class="invalid-feedback">Please enter your confirm password!</div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Reset</button>
                </div>
            </form>

        </div>
    </div>
    {{-- end login --}}
@endsection
