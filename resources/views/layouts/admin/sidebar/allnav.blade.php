<li><a><i class="fa fa-home"></i> Manage Users <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
{{--        <li class="@yield('permission')">--}}
{{--            <a href="{{route('permission.index')}}">--}}
{{--                <i class="fa fa-laptop"></i> Permission--}}
{{--            </a>--}}
{{--        </li>--}}
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
<li><a><i class="fa fa-home"></i> General Information <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li class="@yield('gif')">
            <a href="{{route('general.index')}}">
                <i class="fa fa-laptop"></i> Company Information
            </a>
        </li>
{{--        <li class="@yield('social')">--}}
{{--            <a href="{{route('social.index')}}">--}}
{{--                <i class="fa fa-laptop"></i> Socials--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</li>
<li class="@yield('agent')">
    <a href="{{route('agent.index')}}">
        <i class="fa fa-laptop"></i> Agents
    </a>
</li>
<li class="@yield('log')">
    <a href="{{route('admin.log')}}">
        <i class="fa fa-laptop"></i> Log
    </a>
</li>
