<li><a><i class="fa fa-home"></i> General Information <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li class="@yield('gif')">
            <a href="{{route('general.index')}}">
                <i class="fa fa-laptop"></i> Company Information
            </a>
        </li>
        <li class="@yield('social')">
            <a href="{{route('social.index')}}">
                <i class="fa fa-laptop"></i> Socials
            </a>
        </li>
    </ul>
</li>
