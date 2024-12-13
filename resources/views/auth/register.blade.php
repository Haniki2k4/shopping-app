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
                    <div class="col-lg-4">
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
                    <div class="col-lg-7 bg-sky-300">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                            <x-validation-errors class="mb-4" />
                                <form class="form-validate" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="name" type="text" name="name" :value="old('name')" required autofocus
                                            autocomplete="name" class="input-material">
                                        <label for="name" class="label-material">Tên người dùng</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="login-username" type="email" name="email" :value="old('email')"
                                            required autofocus  class="input-material">
                                        <label for="login-username" class="label-material">Email</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" name="password" required
                                            class="input-material">
                                        <label for="password" class="label-material">Mật khẩu</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            required class="input-material">
                                        <label for="password_confirmation" class="label-material">Xác nhận mật
                                            khẩu</label>
                                    </div>
                                        <x-button class="btn btn-primary" id="register">
                                            {{ __('Đăng kí') }}
                                        </x-button>
                                </form>
                                
                                <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('login') }}">
                                            {{ __('Đã có tài khoản?') }}
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="info d-flex align-items-center">
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