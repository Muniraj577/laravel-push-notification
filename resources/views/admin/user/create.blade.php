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
                            <form class="" action="{{route('admin.store')}}" method="post" novalidate
                                  enctype="multipart/form-data">
                                @csrf
                                <span class="section">Create User</span>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Full Name<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Email Address<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="email" name="email" id="email" class="form-control"
                                               value="{{old('email')}}">
                                        @if($errors->has('email'))
                                            <p class="error alert alert-danger">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Password<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="password" name="password" id="password" class="form-control"
                                               value="{{old('password')}}">
                                        @if($errors->has('password'))
                                            <p class="error alert alert-danger">{{$errors->first('password')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Confirm Password<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                               class="form-control"
                                               value="{{old('password_confirmation')}}">
                                        @if($errors->has('password_confirmation'))
                                            <p class="error alert alert-danger">{{$errors->first('password_confirmation')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Phone number<span
                                                class="required"></span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="text" name="phone" id="phone"
                                               class="form-control"
                                               value="{{old('phone')}}">
                                        @if($errors->has('phone'))
                                            <p class="error alert alert-danger">{{$errors->first('phone')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Status<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <select name="active" id="active" class="form-control">
                                            <option value="1" {{old('active')==1?'selected':''}}>Active</option>
                                            <option value="0" {{old('active')==0?'selected':''}}>Inactive</option>
                                        </select>
                                        @if($errors->has('active'))
                                            <p class="error alert alert-danger">{{$errors->first('active')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Roles<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        @foreach($roles as $role)
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="example" name="roles[]"
                                                           id="{{strtok($role->name, ' ')}}" value="{{$role->id}}">
                                                    <label>{{$role->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if($errors->has('roles'))
                                            <p class="error alert alert-danger">{{$errors->first('roles')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Upload Avatar<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="file" class="form-control" name="avatar" id="img">
                                        <img src="" id="imgPreview">
                                        @if($errors->has('avatar'))
                                            <p class="error alert alert-danger">{{$errors->first('avatar')}}</p>
                                        @endif
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