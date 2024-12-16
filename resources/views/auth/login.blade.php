<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{url('clients/html-magazine-template/css/login/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('clients/html-magazine-template/css/style.blue.css')}}" id="theme-stylesheet">
</head>

<body>
    <div class="login-page">
        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Active</h1>
                                </div>
                                <p style="letter-spacing: 23px;">NEWS</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-sky-300">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form class="form-validate" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="login-username" type="email" name="email" required autofocus
                                            autocomplete="username" class="input-material">
                                        <label for="login-username" class="label-material">Email</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="login-password" type="password" name="password" required
                                            autocomplete="current-password" class="input-material">
                                        <label for="login-password" class="label-material">Mật khẩu</label>
                                    </div>
                                    <x-button class="btn btn-primary" id="logian">
                                        {{ __('Đăng nhập') }}
                                    </x-button>
                                </form>
                                <a href="{{ route('password.request') }}" class="forgot-pass">Quên mật khẩu?</a><br>
                                <small>Chưa có tài khoản?</small><a href="{{ route('register') }}" class="signup"> Tạo
                                    tài khoản</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p style="color: black">2024 &copy; DataScience HUPH Team</p>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{url('clients/html-magazine-template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('clients/html-magazine-template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('clients/html-magazine-template/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{url('clients/html-magazine-template/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('clients/html-magazine-template/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{url('clients/html-magazine-template/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{url('clients/html-magazine-template/js/front.js')}}"></script>
</body>

</html>