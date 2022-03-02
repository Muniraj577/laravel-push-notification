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
                            <form class="" action="{{route('admin.update',$admin->id)}}" method="post"
                                  enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')
                                <span class="section">Edit User</span>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Full Name<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{$admin->name}}">
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
                                               value="{{$admin->email}}">
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
                                               value="{{$admin->phone}}">
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
                                            <option value="1" {{$admin->active==1?'selected':''}}>Active</option>
                                            <option value="0" {{$admin->active==0?'selected':''}}>Inactive</option>
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
                                                    <input type="checkbox" id="{{strtok($role->name,' ')}}" class="example" name="roles[]"
                                                           value="{{$role->id}}" @foreach($admin->roles as $value) {{$role->id==$value->id ? 'checked': ''}} @endforeach>
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
                                    <label class="pl-2 mt-3">Upload avatar<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="file" class="form-control" name="avatar" id="img">
                                        <img src="{{asset('images/admin/avatars/'.$admin->avatar)}}" id="imgPreview"
                                             style="height: 100px; width: 100px;">
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