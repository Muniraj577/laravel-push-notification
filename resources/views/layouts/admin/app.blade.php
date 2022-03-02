<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/ico"/>
    <title>@yield('title') | {{env('APP_NAME')}}</title>
    @include('layouts.admin.snippets.styles')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
    @include('layouts.admin.snippets.sidebar')

    <!-- top navigation -->
    @include('layouts.admin.snippets.nav')
    <!-- /top navigation -->

        <!-- page content -->
    @yield('content')
    <!-- /page content -->

        <!-- footer content -->
    @include('layouts.admin.snippets.footer')
    <!-- /footer content -->
    </div>
</div>
@include('layouts.admin.snippets.script')
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script>
    var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
        cluster: '{{env("PUSHER_APP_CLUSTER")}}',
        encrypted: false,
    });


    var channel = pusher.subscribe('notify-channel');
    channel.bind('App\\Events\\Notify', function (data) {
        var html = `<li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image">
                                    <img src="`+data.avatar+`" alt="Profile Image"/>
                                </span>
                                <span>
                            <span>` + data.user_name + `</span>
                                <span class="time">3 mins ago</span>
                            </span>
                                <span class="message">
                                    ` + data.message + `
                                </span>
                            </a>
                        </li>`;
        $("ul#newNotify").prepend(html);
        console.log(html);
        alert(data.message);
    });
</script>
</body>
</html>
