<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900');
            body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            background: #eee;
            color:#666;
            }
            .login-container{
            height: 100vh;
            width: 100%;
            }
            .login-form{
            margin: auto;
            width: 370px;
            padding: 15px;
            max-width: 100%;
            }
            .login-form .form-control{
            font-size: 15px;
            min-height: 48px;
            font-weight: 500;
            }
            .login-form a{
            text-decoration: none;
            color:#666;
            }
            .login-form a:hover{
            color:#7e59b6;
            }
            .forgot-link{
            font-size: 13px;
            }

            .form-control:focus{
            border-color:#7e59b6;
            box-shadow: 0 0 0 0.2rem rgba(114,61,190,.25);
            }
            .btn-custom{
            background: #7e59b6;
            border-color:#7e59b6;
            color:#fff;
            font-size: 15px;
            font-weight: 600;
            min-height: 48px;
            }
            .btn-custom:focus,
            .btn-custom:hover,
            .btn-custom:active,
            .btn-custom:active:focus{
            background: #7e59b6;
            border-color: #7e59b6;
            color:#fff;
            }
            .btn-custom:focus{
            box-shadow: 0 0 0 0.2rem rgba(63, 45, 88, 0.25);
            }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center login-container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form method="POST" action="{{ route('loginCheck') }}" class="login-form text-center" >
        {{ csrf_field() }}
            <h1 class="mb-4 font-weight-light text-uppercase">Login</h1>
            @if (Session('message'))
                {{ Session('message') }}
            @endif

        <div class="form-group">
            <input type="text" name="email" class="form-control rounded-pill form-control-lg mb-2" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control rounded-pill form-control-lg mb-2" placeholder="Password">
        </div>
        <div class="forgot-link form-group d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember Password</label>
            </div>
            <a href="#">Forgot Password?</a>
        </div>
            <button type="submit" name="submit" value="Login" class="btn mt-3 px-5 btn-lg btn-custom btn-block text-uppercase">Log in</button>
            <p class="mt-3 font-weight-normal">Don't have an account? <a href="{{ url('Register') }} ">Register Now !!</a></p>
    </form>
</div>
</body>
</html>
