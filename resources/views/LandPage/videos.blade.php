@if ($videos->total() > 0)
    <div class="blog-area section-light-blog" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title light">
                        <h1 class="text-uppercase">Últimos <span>Videos</span></h1>
                        <img src="/img/icon/title-bg.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-carousel">
                    @foreach($videos as $item)
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="{{ route('video.show', [ 'slug' => $item->slug ]) }}">
                                        <img src="https://img.youtube.com/vi/{{ $item->link }}/0.jpg" alt="{{ $item->titulo }}">
                                        <span class="date-time">{{ Carbon\Carbon::parse($item->created_at)->format('d') }}
                                            <span>{{ Carbon\Carbon::parse($item->created_at)->format('m') }}</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="blog-text">
                                    <h3>
                                        <a href="{{ route('video.show', [ 'slug' => $item->slug ]) }}">{{ $item->titulo }}</a>
                                    </h3>
                                    <a href="{{ route('video.show', [ 'slug' => $item->slug ]) }}" class="blog-button">
                                        Leia Mais <i class="fa fa-caret-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif