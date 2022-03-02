@extends('layouts.admin.app')
@section('title','User')
@section('user','active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('layouts.admin.snippets.msg')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Exams</h2>
                            <a href="{{route('admin.create')}}" class="btn btn-success float-right">Add a new Admin</a>
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
                                                <th>Avatar</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($admins as $admin)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('images/admin/avatars/'.$admin->avatar)}}"
                                                             alt="" width="50px">
                                                    </td>
                                                    <td>{{$admin->name}}</td>
                                                    <td>{{$admin->email}}</td>
                                                    <td>{{$admin->phone}}</td>
                                                    <td>
                                                        @foreach($admin->roles as $role)
                                                            {{ $loop->first ? '' : ', ' }}
                                                            {{$role->name}}
                                                        @endforeach
                                                    </td>
                                                    <td>{{$admin->active?'Active':'Inactive'}}</td>
                                                    <td>
                                                        <div class="d-inline-flex">
                                                            <a href="{{route('admin.edit',$admin->id)}}"
                                                               class="btn btn-sm" style="color: blue">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            {{--<a href="{{route('admin.destroy',$admin->id)}}"--}}
                                                               {{--class="btn btn-sm" style="color: red">--}}
                                                                {{--<i class="fa fa-trash"></i>--}}
                                                            {{--</a>--}}
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