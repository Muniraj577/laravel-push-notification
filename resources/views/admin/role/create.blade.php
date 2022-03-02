@extends('layouts.admin.app')
@section('title','Role')
@section('role','active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="" action="{{route('role.store')}}" method="post" novalidate>
                                @csrf
                                <span class="section">Create Role</span>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Role Name<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6 ">
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="alert-form form-group">
                                    <label class="pl-2 mt-3">Permissions<span
                                                class="required">*</span></label>
                                    <div class="col-md-12 col-sm-6">
                                        @foreach($permissions as $permission)
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input type="checkbox" class="example"
                                                           id="{{strtok($permission->name, ' ')}}" name="permissions[]"
                                                           value="{{$permission->id}}">
                                                    <label class="font-weight-bold" style="font-size: 14px;">{{$permission->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if($errors->has('permissions'))
                                            <p class="error alert alert-danger">{{$errors->first('permissions')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="">
                                    <div class="text-center">
                                        <div class="col-md-6 offset-md-3 mt-3">
                                            <button type='submit' class="btn btn-primary">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
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
