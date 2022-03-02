@extends('layouts.admin.app')
@section('title','Log')
@section('log','active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('layouts.admin.snippets.msg')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Logs</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable"
                                               class="table table-striped table-bordered table-responsive-xl"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <td>S.N</td>
                                                <th>User</th>
                                                <th>Role</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                                <th>Table Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($logs as $log)
                                                <tr>
                                                    <td>{{++$id}}</td>
                                                    <td>{{$log->admin_name}}</td>
                                                    <td>{{$log->role_name ? $log->role_name : 'Admin'}}</td>
                                                    <td>{{$log->phone}}</td>
                                                    <td>{{$log->message}}</td>
                                                    <td>{{$log->action}}</td>
                                                    <td>{{$log->table_name}}</td>
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