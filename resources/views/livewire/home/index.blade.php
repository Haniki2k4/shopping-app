@section('title', 'Danh sách tin tức')
@section('heading', 'Danh sách tin tức')

<div class="p-5 pt-0">
    <div class="container-fluid latest-news py-5 pt-0">
        <div class="container py-5 pt-4">
            <h2 class="mb-4" style="font-size: 300%; font-weight: bold">Latest News</h2>
            <div class="latest-news-carousel owl-carousel">
                @foreach($featuredPosts as $key => $post)
                    <div class="latest-news-item">
                        <div class="bg-light rounded p-2 pt-2">
                            <div class="rounded-top overflow-hidden">
                                @if ($post['image'])
                                    <img src="{{ asset('storage/' . $post['image'])}}" alt="{{$post['title']}}"
                                        class="img-zoomin img-fluid rounded w-100">
                                @else
                                    <img src="{{url('admin/dist/assets/img/Logo_ACNews.jpg')}}"
                                        class="img-zoomin img-fluid rounded w-100" alt="">
                                @endif
                            </div>
                            <div class="d-flex flex-column p-4">
                                <a wire:click="viewPost({{$post['id']}})" class="h3">{{$post['title']}}</a>
                                <div class="d-flex justify-content-between">
                                    <a wire:click="viewPost({{$post['id']}})" class="small text-body link-hover">by
                                        {{ $post['created_by'] }}</a>
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
            @foreach($recentPosts as $key => $posts)
                <div class="row align-items-center my-2">
                    <div class="col-2 justify-items-center">
                        <div class="overflow-hidden rounded">
                            @if ($posts['image'])
                                <img src="{{ asset('storage/' . $posts['image'])}}" alt="{{$posts['title']}}"
                                    class="img-zoomin img-fluid rounded w-60 h-60">
                            @else
                                <img src="{{url('admin/dist/assets/img/Logo_ACNews.jpg')}}"
                                    class="img-zoomin img-fluid rounded w-60 h-60" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="features-content d-flex flex-column">
                            <a href="#" class="h3">{{$posts['title']}}</a>
                            <p class="my-2">{{$posts['description']}}</p>
                            <small><i class="fa fa-clock"> by {{ $posts['created_by'] }}</i> </small>
                            <small><i class="fas fa-calendar-alt me-1">
                                    {{ $posts['updated_at']->format('m/d/Y') }}</i></small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>