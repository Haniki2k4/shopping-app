<div class="container-fluid py-5">
    <div class="container-fluid latest-news py-5">
        <div class="container py-5">
            <h2 class="mb-4">Tin nóng hổi</h2>
            <div class="latest-news-carousel owl-carousel">
                @foreach($featuredPosts as $key => $post)
                    <div class="latest-news-item">
                        <div class="bg-light rounded">
                            <div class="rounded-top overflow-hidden">
                                <img src="{{url('/clients/html-magazine-template/img/news-6.jpg')}}"
                                    class="img-zoomin img-fluid rounded-top w-100" alt="">
                            </div>
                            <div class="d-flex flex-column p-4">
                                <a href="#" class="h4">{{$post['title']}}</a>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="small text-body link-hover">by {{ $post['created_by'] }}</a>
                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                                        {{ $post['updated_at']->format('m/d/Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-light rounded p-2 pt-0">
        <div class="container-fluid py-5">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="overflow-hidden rounded">
                        <img src="{{url('/clients/html-magazine-template/img/news-3.jpg')}}"
                            class="img-zoomin img-fluid rounded w-50" alt="">
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