@extends('layouts.admin.app')
@section('title','Permission')
@section('permission','active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('layouts.admin.snippets.msg')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Cities</h2>
                            <a href="{{route('permission.create')}}" class="btn btn-success float-right">Add a new
                                Permission</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($permissions as $permission)
                                                <tr>
                                                    <td>{{$permission->name}}</td>
                                                    <td>
                                                        <div class="d-inline-flex">
                                                            <a href="{{route('permission.edit',$permission->id)}}"
                                                               class="btn btn-sm" style="color: blue">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{route('permission.destroy',$permission->id)}}"
                                                               class="btn btn-sm" style="color: red">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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