@extends('layouts.admin.app')
@section('title','Agent')
@section('agent','active')
@section('content')
    <div class="right_col" agent="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('layouts.admin.snippets.msg')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Cities</h2>
                            <a href="{{route('agent.create')}}" class="btn btn-success float-right">Add a new Agent</a>
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
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Health Post</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($agents as $agent)
                                                <tr>
                                                    <td>{{$agent->name}}</td>
                                                    <td>{{$agent->address}}</td>
                                                    <td>{{$agent->phone}}</td>
                                                    <td>{{$agent->health_post}}</td>
                                                    <td>
                                                        <div class="d-inline-flex">
                                                            <a href="#"
                                                               class="btn btn-sm" style="color: blue">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#"
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
