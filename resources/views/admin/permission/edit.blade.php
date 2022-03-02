@extends('layouts.admin.app')
@section('title','Permission')
@section('permission','active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="" action="{{route('permission.update',$permission->id)}}" method="post"
                                  novalidate>
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$permission->id}}">
                                <span class="section">Edit Permission</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Permission Name<span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{$permission->name}}">
                                        @if($errors->has('name'))
                                            <p class="error alert alert-danger">{{$errors->first('name')}}</p>
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