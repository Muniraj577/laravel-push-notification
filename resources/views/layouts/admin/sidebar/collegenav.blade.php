<li><a><i class="fa fa-home"></i> Colleges <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li class="@yield('ownership')">
            <a href="{{route('ownership.index')}}">
                <i class="fa fa-laptop"></i> Ownership
            </a>
        </li>
        <li class="@yield('data')">
            <a href="{{route('university.index')}}">
                <i class="fa fa-laptop"></i> University
            </a>
        </li>
        <li class="@yield('college')">
            <a href="{{route('college.index')}}">
                <i class="fa fa-laptop"></i> Colleges
            </a>
        </li>
        <li class="@yield('course')">
            <a href="{{route('course.index')}}">
                <i class="fa fa-laptop"></i> Courses
            </a>
        </li>
        <li class="@yield('exam')">
            <a href="{{route('exam.index')}}">
                <i class="fa fa-laptop"></i> Exams
            </a>
        </li>
    </ul>
</li>