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
                            <form class="" action="{{route('role.update',$role->id)}}" method="post" novalidate>
                                @csrf
                                @method('PUT')
                                <span class="section">Edit Role</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Role Name<span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{$role->name}}">
                                        @if($errors->has('name'))
                                            <p class="error alert alert-danger">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Select Province<span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach($permissions as $permission)
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input type="checkbox" name="permissions[]" class="example"
                                                           id="{{strtok($permission->name,' ')}}"
                                                           value="{{$permission->id}}" @foreach($role->permissions as $value) {{$permission->id == $value->id ? 'checked': ''}}  @endforeach>
                                                    <label class="font-weight-bold" style="font-size: 14px;">{{$permission->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if($errors->has('permissions'))
                                            <p class="error alert alert-danger">{{$errors->first('permissions')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
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
