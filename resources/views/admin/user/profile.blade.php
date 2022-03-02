@extends('layouts.admin.app')
@section('title','User')
@section('user','active')
@section('content')
    <style>
        .admin-logo img {
            border: 2px solid grey;
            padding: 5px;
            height: 100px;
        }
        .card-header{
            padding: .15rem .15rem;
        }
    </style>
    <?php
    $admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
    ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="admin-logo">
                                            <img src="{{asset('images/admin/avatars/'.$admin->avatar)}}"
                                                 class="img-circle img-rounded img-fluid d-block mx-auto" alt="">
                                        </div>
                                        <div class="text-center">
                                            <i class="fa fa-user"> <span
                                                    class="font-weight-bold">{{$admin->name}}</span></i>
                                            <i class="fa fa-envelope"> <span
                                                    class="font-weight-bold">{{$admin->email}}</span></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9">
{{--                                @include('layouts.admin.snippets.msg')--}}
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-password-tab" data-toggle="pill"
                                                   href="#pills-password" role="tab" aria-controls="pills-password"
                                                   aria-selected="true">Change Password</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-email-tab" data-toggle="pill"
                                                   href="#pills-email" role="tab" aria-controls="pills-email"
                                                   aria-selected="false">Change Email</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-image-tab" data-toggle="pill"
                                                   href="#pills-image" role="tab" aria-controls="pills-image"
                                                   aria-selected="false">Change Profile Picture</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show" id="pills-password" role="tabpanel"
                                                 aria-labelledby="pills-password-tab">
                                                <form action="{{route('adminNewPassword')}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Current Password</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <input type="password" name="current_password"
                                                                   class="form-control">
                                                        </div>
                                                        @if($errors->has('current_password'))
                                                            <span
                                                                class="text-danger">{{$errors->first('current_password')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="row pb-2">
                                                        <div class="col-2">
                                                            <label for="">New Password</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <input type="password" name="new_password"
                                                                   class="form-control">
                                                        </div>
                                                        @if($errors->has('new_password'))
                                                            <span
                                                                class="text-danger">{{$errors->first('new_password')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Confirm New Password</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <input type="password" name="confirm_new_password"
                                                                   class="form-control">
                                                        </div>
                                                        @if($errors->has('confirm_new_password'))
                                                            <span
                                                                class="text-danger">{{$errors->first('confirm_new_password')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="text-center pt-5">
                                                        <button class="btn btn-outline-success" type="submit">Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="pills-email" role="tabpanel"
                                                 aria-labelledby="pills-email-tab">
                                                <form action="{{route('changeAdminEmail')}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Current Email</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <input type="text" value="{{$admin->email}}"
                                                                   class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-2 mt-1">
                                                        <div class="col-2">
                                                            <label for="">New Email</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <input type="text" value="{{old('email')}}" name="email"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-outline-success">Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="pills-image" role="tabpanel"
                                                 aria-labelledby="pills-image-tab">
                                                <form action="{{route('chageAdminAvatar')}}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <label for="">Change Profile</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <input type="file" name="image" id="img"
                                                                   class="form-control">
                                                            <img height="100px"
                                                                 src="{{asset('images/admin/avatars/'.$admin->avatar)}}"
                                                                 id="imgPreview" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="btn btn-outline-success" type="submit">Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
