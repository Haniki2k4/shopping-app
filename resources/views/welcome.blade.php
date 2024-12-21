<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Active News</title>

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
                        <div class="overflow-hidden" style="width: 735px;">
                            <div id="note" class="ps-2">
                                <img src="{{url('clients/html-magazine-template/img/features-fashion.jpg')}}"
                                    class="img-fluid rounded-circle border border-3 border-primary me-2"
                                    style="width: 30px; height: 30px;" alt="">
                                <a href="#">
                                    <p class="text-white mb-0 link-hover">Trần Đức Hải - Trần Thị Lan 
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl">
                    <a href="index.html" class="navbar-brand mt-3">
                        <p class="text-primary display-6 mb-2" style="line-height: 0;">Active</p>
                        <small class="text-body fw-normal" style="letter-spacing: 30px;">NEWS</small>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <a href="detail-page.html" class="nav-item nav-link">Detail Page</a>
                            <a href="404.html" class="nav-item nav-link">404 Page</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="#" class="dropdown-item">Dropdown 1</a>
                                    <a href="#" class="dropdown-item">Dropdown 2</a>
                                    <a href="#" class="dropdown-item">Dropdown 3</a>
                                    <a href="#" class="dropdown-item">Dropdown 4</a>
                                </div>
                            </div>
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
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-7 col-xl-8 mt-0">
                    <div class="position-relative overflow-hidden rounded">
                        <img src="{{url('clients/html-magazine-template/img/news-1.jpg')}}"
                            class="img-fluid rounded img-zoomin w-100" alt="">
                        <div class="d-flex justify-content-center px-4 position-absolute flex-wrap"
                            style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> 06 minute
                                read</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> 3.5k Views</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> 05
                                Comment</a>
                            <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                        </div>
                    </div>
                    <div class="border-bottom py-3">
                        <a href="#" class="display-4 text-dark mb-0 link-hover">Lorem Ipsum is simply dummy text of the
                            printing</a>
                    </div>
                    <p class="mt-3 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley standard dummy text ever since the 1500s, when an unknown printer took a
                        galley...
                    </p>
                    <div class="bg-light p-4 rounded">
                        <div class="news-2">
                            <h3 class="mb-4">Top Story</h3>
                        </div>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="rounded overflow-hidden">
                                    <img src="{{url('clients/html-magazine-template/img/news-2.jpg')}}"
                                        class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="#" class="h3">Stoneman Clandestine Ukrainian claims successes against
                                        Russian.</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock"> 06 minute read</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> 3.5k Views</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 pt-0">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="rounded overflow-hidden">
                                    <img src="{{url('clients/html-magazine-template/img/news-3.jpg')}}"
                                        class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <a href="#" class="h4 mb-2">Get the best speak market, news.</a>
                                    <p class="fs-5 mb-0"><i class="fa fa-clock"> 06 minute read</i> </p>
                                    <p class="fs-5 mb-0"><i class="fa fa-eye"> 3.5k Views</i></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{url('clients/html-magazine-template/img/news-3.jpg')}}"
                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{url('clients/html-magazine-template/img/news-4.jpg')}}"
                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{url('clients/html-magazine-template/img/news-5.jpg')}}"
                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{url('clients/html-magazine-template/img/news-6.jpg')}}"
                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{url('clients/html-magazine-template/img/news-7.jpg')}}"
                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{url('clients/html-magazine-template/img/news-7.jpg')}}"
                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Post Section End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer py-0">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#" class="d-flex flex-column flex-wrap">
                            <p class="text-white mb-0 display-6">Newsers</p>
                            <small class="text-light" style="letter-spacing: 11px; line-height: 0;">Newspaper</small>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex position-relative rounded-pill overflow-hidden">
                            <input class="form-control border-0 w-100 py-3 rounded-pill" type="email"
                                placeholder="example@gmail.com">
                            <button type="submit"
                                class="btn btn-primary border-0 py-3 px-5 rounded-pill text-white position-absolute"
                                style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="footer-item-1">
                    <h4 class="mb-4 text-white">Get In Touch</h4>
                    <div class="row d-flex line-h">
                        <p class="col-sm  text-secondary line-h">Address: <span class="text-white">123 Streat, New
                                York</span>
                        </p>
                        <p class="col-sm  text-secondary line-h">Email: <span
                                class="text-white">Example@gmail.com</span>
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
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site
                            Name</a>, All right reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-2 border-white rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


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