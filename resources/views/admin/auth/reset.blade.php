<!doctype html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('admin/css/login.css')}}">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body id="LoginForm">
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Reset Password</h2>
            </div>
            <form id="Login" action="{{route('admin.reset')}}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" id="inputEmail"
                           placeholder="Email Address" name="email" value="{{ $email ?? old('email') }}" required
                           autofocus>
                    @if($errors->has('email'))
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" placeholder="New Password" type="password" class="form-control" name="password"
                           required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password-confirm" placeholder="Confirm New Password" type="password" class="form-control"
                           name="password_confirmation"
                           required>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </span>
                    @endif

                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
        <p class="botto-text"> Designed by Paaila Technology</p>
    </div>
</div>
</body>
</html>