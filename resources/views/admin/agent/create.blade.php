@extends('layouts.admin.app')
@section('title','User')
@section('user','active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="" action="{{route('agent.store')}}" method="post" novalidate
                                  enctype="multipart/form-data">
                                @csrf
                                <span class="section">Create User</span>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Full Name<span
                                            class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="text" name="name" id="name" class="form-control"

                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Health Post<span
                                            class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="text" name="health_post" id="email" class="form-control"
                                               value="{{old('email')}}">

                                    </div>
                                </div>
                                <div class="">
                                    <div class="alert-form">
                                        <div class="text-center">
                                            <div class="col-md-6 offset-md-3 mt-3">
                                                <button type='submit' class="btn btn-primary">Submit</button>
                                                <button type='reset' class="btn btn-success">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
