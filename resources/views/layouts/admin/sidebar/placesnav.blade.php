<li><a><i class="fa fa-home"></i> Places <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li class="@yield('state')">
            <a href="{{route('state.index')}}">
                Province
            </a>
        </li>
        <li class="@yield('city')">
            <a href="{{route('city.index')}}">
                City
            </a>
        </li>
    </ul>
</li>