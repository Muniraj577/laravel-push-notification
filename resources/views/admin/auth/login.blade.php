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
                <h2>Admin Login</h2>
                <p>Please enter your email and password</p>
            </div>
            <form id="Login" action="{{route('admin.postLogin')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                           placeholder="Email Address" name="email" value="{{ old('email') }}" required
                           autocomplete="email"
                           autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           id="inputPassword" name="password" placeholder="Password" required
                           autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="forgot">
                    <a href="{{route('admin.getForgotPassword')}}">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <p class="botto-text"> Designed by Paaila Technology</p>
    </div>
</div>
</body>
</html>