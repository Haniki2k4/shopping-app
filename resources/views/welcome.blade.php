<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Active News</title>
    <link rel="icon" type="image/x-icon" href="{{url('admin/dist/assets/img/Logo_ACNews.jpg')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <!--end::Fonts-->

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('clients/html-magazine-template/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('clients/html-magazine-template/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('clients/html-magazine-template/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('clients/html-magazine-template/css/style.css')}}" rel="stylesheet">
    <!-- Styles -->
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid sticky-top px-0">
        <div class="container-fluid topbar bg-dark d-none d-lg-block">
            <div class="container px-0">
                <div class="topbar-top d-flex justify-content-between flex-lg-wrap">
                    <div class="top-info flex-grow-0">
                        <span class="rounded-circle btn-sm-square bg-primary me-2">
                            <i class="fas fa-bolt text-white"></i>
                        </span>
                        <div class="pe-2 me-3 border-end border-white d-flex align-items-center">
                            <p class="mb-0 text-white fs-6 fw-normal">Teams</p>
                        </div>
                        <div class="overflow-hidden" style="width: 800px;">
                            <div id="note" class="ps-2">
                                <img src="{{url('admin/dist/assets/img/Logo_ACNews.jpg')}}"
                                    class="img-fluid rounded-circle border border-3 border-primary me-2"
                                    style="width: 30px; height: 30px;" alt="">
                                <a href="#">
                                    <p class="text-white mb-0 link-hover">Trần Đức Hải - Trần Thị Lan
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="top-link flex-lg-wrap">
                        <i class="fas fa-calendar-alt text-white border-end border-secondary pe-2 me-2"><span
                                id="current-time"></span></i>
                        <div class="d-flex icon">
                            <p class="mb-0 text-white me-2">Follow Us:</p>
                            <a href="" class="me-2"><i class="fab fa-facebook-f text-body link-hover"></i></a>
                            <a href="" class="me-2"><i class="fab fa-linkedin-in text-body link-hover"></i></a>
                            <a href="" class="me-2"><i class="fab fa-skype text-body link-hover"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl">
                    <a href="{{url('/')}}" class="navbar-brand mt-3">
                        <p class="text-primary display-6 mb-2" style="line-height: 0;">Active</p>
                        <small class="text-body fw-normal" style="letter-spacing: 30px;">NEWS</small>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top">
                            <a href="{{ url('/ ') }}"
                                class="nav-item nav-link {{ Request::is('index') ? 'active' : '' }}">Trang chủ</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Danh mục</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="#" class="dropdown-item">Dropdown 1</a>
                                    <a href="#" class="dropdown-item">Dropdown 2</a>
                                    <a href="#" class="dropdown-item">Dropdown 3</a>
                                    <a href="#" class="dropdown-item">Dropdown 4</a>
                                </div>
                            </div>
                            @if (Route::currentRouteName() == 'view-post') {{-- Kiểm tra route name --}}
                                <span class="nav-item nav-link active">Chi tiết</span>
                            @endif
                            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                        </div>
                        <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0">
                            <div class="my-auto">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                        @if (Route::has('login'))
                                            @auth
                                                {{Auth::user()->name}}
                                                <i class="fas fa-user text-primary"></i>
                                            @else
                                                Guest
                                                <i class="fas fa-user text-primary"></i>
                                            @endauth
                                        @endif
                                    </a>
                                    <div class="dropdown-menu m-1 bg-secondary rounded-0">
                                        @if (Route::has('login'))
                                            @auth
                                                @if (Auth::user()->role === 'admin')
                                                    <a href="{{ url('/dashboard') }}" class="dropdown-item">Dashboard</a>
                                                    <a href="{{ url('/profile.show') }}" class="dropdown-item">Trang cá nhân</a>
                                                @else
                                                    <a href="{{ url('/profile.show') }}" class="dropdown-item">Trang cá nhân</a>
                                                @endif
                                                <hr />
                                                <a href="{{ route('logout') }}" class="dropdown-item"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Đăng xuất
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}" class="dropdown-item">Đăng nhập</a>
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="dropdown-item">Đăng kí</a>
                                                @endif
                                            @endauth
                                        @endif
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </div>
                        </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Main Post Section Start -->
    <main class="app-main">
        {{$slot}}
    </main>
    <!-- Main Post Section End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer py-0">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#" class="d-flex flex-column flex-wrap">
                            <p class="text-white mb-0 display-6">Active</p>
                            <small class="text-light" style="letter-spacing: 20px; line-height: 0;">News</small>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex position-relative rounded-pill overflow-hidden">
                            <input class="form-control border-0 w-100 py-3 rounded-pill" type="email"
                                placeholder="Đang phát triển">
                            <button type="submit"
                                class="btn btn-primary border-0 py-3 px-5 rounded-pill text-white position-absolute"
                                style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="footer-item-1">
                    <div class="row d-flex line-h">
                        <h4 class="mb-4 text-white">Get In Touch</h4>
                        </p>
                        <p class="col-sm  text-secondary line-h">Address: <span class="text-white">1A Đ.Đức Thắng, Bắc
                                Từ Liêm</span>
                        </p>
                        <p class="col-sm  text-secondary line-h">Email: <span
                                class="text-white">datascience@gmail.com</span>
                        </p>
                        <p class="col-sm text-secondary line-h">Phone: <span class="text-white">+0123 4567 8910</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>HUPH Data
                            Science</a>, All right reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-2 border-white rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    @stack('modals')
    @livewireScripts
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('clients/html-magazine-template/lib/easing/easing.min.js')}}"></script>
    <script src="{{url('clients/html-magazine-template/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{url('clients/html-magazine-template/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{url('clients/html-magazine-template/js/main.js')}}"></script>
    <script>
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
        document.getElementById('current-time').textContent = now.toLocaleDateString('vi-VN', options);
    </script>
</body>

</html>