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
        <div class="container d-flex align-items-center">
        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession
            <div class="form-holder has-shadow">
                <div class="row" style="height: 550px">
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
                        <div class="form d-flex align-items-center" style="flex-direction: column; justify-content: center;">
                            <label class="label-material text-white">Bạn quên mật khẩu? Đừng lo lắng.
                                Hãy cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn một email xác
                                nhận đổi mật
                                khẩu mới</label>
                            <div class="content">
                                <x-validation-errors class="mb-4 text-red-600" />
                                <form class="form-validate" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" name="email" :value="old('email')" required
                                            autofocus class="input-material">
                                        <label for="email" class="label-material">Email của bạn</label>
                                    </div>
                                    <x-button class="btn btn-primary" id="emailreset">
                                        {{ __('Xác nhận email') }}
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="info d-flex align-items-center">
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
            <script
                src="{{url('clients/html-magazine-template/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
            <script src="{{url('clients/html-magazine-template/js/front.js')}}"></script>
</body>

</html>