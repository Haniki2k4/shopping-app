<div class="container-fluid py-5">
    <div class="container py-5">
        <ol class="breadcrumb justify-content-start mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Post</a></li>
            <li class="breadcrumb-item active text-dark">{{ Str::limit($post->title, 100) }}</li>
        </ol>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="#" class="h2 display-5"
                        style="font-family: 'Times New Roman', Times, serif">{{$post['title']}}</a>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                    <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> Unknown</a>
                    <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> Unknown</a>
                    <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> Unknown</a>
                </div>
                <div class="my-4" style="font-weight: bold, color: black">
                    {{$post['description']}}
                </div>
                <div class="my-4" style="color: black">
                    {!!$post['detail']!!}
                </div>
                <div class="tab-class">
                    <div class="d-flex justify-content-between border-bottom mb-4">
                        <ul class="nav nav-pills d-inline-flex text-center">
                            <li class="nav-item mb-3">
                                <h5 class="mt-2 me-3 mb-0">Tags:</h5>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill active me-2" data-bs-toggle="pill"
                                    href="#tab-1">
                                    <span class="text-dark" style="width: 100px;">{{ $categoryTitle }}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 me-3">Share:</h5>
                            <i
                                class="fab fa-facebook-f link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                            <i
                                class="btn fab bi-twitter link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                            <i
                                class="btn fab fa-instagram link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                            <i
                                class="btn fab fa-linkedin-in link-hover btn btn-square rounded-circle border-primary text-dark"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-light rounded my-4 p-4">
                    <h4 class="mb-4">You Might Also Like</h4>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center p-3 bg-white rounded">
                                <img src="img/chatGPT.jpg" class="img-fluid rounded" alt="">
                                <div class="ms-3">
                                    <a href="#" class="h5 mb-2">Lorem Ipsum is simply dummy text of the printing</a>
                                    <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 minute read</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center p-3 bg-white rounded">
                                <img src="img/chatGPT-1.jpg" class="img-fluid rounded" alt="">
                                <div class="ms-3">
                                    <a href="#" class="h5 mb-2">Lorem Ipsum is simply dummy text of the printing</a>
                                    <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 minute read</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light rounded p-4">
                    <h4 class="mb-4">Bình luận</h4>
                    <div class="p-4 bg-white rounded mb-4">
                        <div class="row g-4">
                            <div class="col-2">
                                <img src="{{url('admin/dist/assets/img/Logo_ACNews.jpg')}}"
                                    class="img-fluid rounded-circle w-50" alt="">
                            </div>
                            <div class="col-10">
                                <div class="d-flex justify-content-between">
                                    <h5>Admin</h5>
                                    <a href="#" class="link-hover text-body fs-6"><i
                                            class="fas fa-long-arrow-alt-right me-1"></i> Trả lời</a>
                                </div>
                                <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i>
                                    Unknow</small>
                                <p class="mb-0">
                                    Chức năng đang được phát triển
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light rounded p-4 my-4">
                    <h4 class="mb-4">Bình luận</h4>
                    <form action="#">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <input type="text" class="form-control py-3" placeholder="Full Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control py-3" placeholder="Email Address">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="textarea" id="" cols="30" rows="7"
                                    placeholder="Write Your Comment Here"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="form-control btn btn-primary py-3" type="button">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-4">
                    <div class="position-relative rounded overflow-hidden mb-3">
                        @if ($post['image'])
                            <img src="{{ asset('storage/' . $post['image'])}}" alt="{{$post['title']}}"
                                class="img-zoomin img-fluid rounded w-100">
                        @else
                            <img src="{{url('admin/dist/assets/img/Logo_ACNews.jpg')}}"
                                class="img-zoomin img-fluid rounded w-100" alt="">
                        @endif
                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                            style="top: 20px; left: 20px;">
                            {{ $categoryTitle }}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 rounded border">
                            <h4 class="mb-4">Danh mục</h4>
                            <div class="row g-2">
                                <div class="col-12">
                                    <a href="#"
                                        class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                                        Đang phát triển
                                    </a>
                                </div>
                            </div>
                            <h4 class="my-4">Kết nối</h4>
                            <div class="row g-4">
                                <div class="col-12">
                                    <a href="#"
                                        class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2">
                                        <i class="fab fa-facebook-f btn btn-light btn-square rounded-circle me-3"></i>
                                        <span class="text-white">0 Fans</span>
                                    </a>
                                    <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                                        <i class="fab fa-twitter btn btn-light btn-square rounded-circle me-3"></i>
                                        <span class="text-white">0 Follower</span>
                                    </a>
                                    <a href="#"
                                        class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2">
                                        <i class="fab fa-youtube btn btn-light btn-square rounded-circle me-3"></i>
                                        <span class="text-white">0 Subscriber</span>
                                    </a>
                                    <a href="#" class="w-100 rounded btn btn-dark d-flex align-items-center p-3 mb-2">
                                        <i class="fab fa-instagram btn btn-light btn-square rounded-circle me-3"></i>
                                        <span class="text-white">0 Follower</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>