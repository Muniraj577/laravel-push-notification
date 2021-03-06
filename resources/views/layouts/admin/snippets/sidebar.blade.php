<?php
$user = Auth::guard('admin')->user();
?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin.dashboard')}}" class="site_title"><i class="fa fa-paw"></i>
                <span>{{env('APP_NAME')}}</span></a>
        </div>
        <div class="clearfix"></div>
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('images/admin/avatars/'.Auth::guard('admin')->user()->avatar)}}"
                     alt="{{Auth::guard('admin')->user()->name}}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::guard('admin')->user()->name}}</h2>
            </div>
        </div>
        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li class="@yield('dashboard')">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fa fa-laptop"></i> Dashboard
                        </a>
                    </li>
                    @include('layouts.admin.sidebar.allnav')
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>
