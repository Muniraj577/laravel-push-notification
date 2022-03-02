<li><a><i class="fa fa-home"></i> Manage Users <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li class="@yield('permission')">
            <a href="{{route('permission.index')}}">
                <i class="fa fa-laptop"></i> Permission
            </a>
        </li>
        <li class="@yield('role')">
            <a href="{{route('role.index')}}">
                <i class="fa fa-laptop"></i> Roles
            </a>
        </li>
        <li class="@yield('user')">
            <a href="{{route('admin.index')}}">
                <i class="fa fa-laptop"></i> Users
            </a>
        </li>
    </ul>
</li>