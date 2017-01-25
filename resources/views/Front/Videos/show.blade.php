@extends('Front.Base.internas')
@section('body')
    <div class="feature-area section-light-text mt3">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {!! Breadcrumbs::render('video', $entity) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="feature-text">
                        <h3>{{ $entity->titulo }}</h3>
                        <br/>
                        <iframe width="853px" height="480px"
                                src="https://www.youtube.com/embed/{{ $entity->link }}" frameborder="0"
                                allowfullscreen></iframe>
                        <p>
                            {!!  $entity->resumo !!}
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="playlist">
                        <h5><i class="fa fa-video-camera"></i> {{ $entity->categoria->titulo }}</h5>
                        <hr>
                        <ul>
                            @foreach($playlist as $item)
                                <li>
                                    <a href="{{ route('video.show', [ 'slug' => $item->slug ]) }}">
                                        <h4>{{ $item->titulo }}</h4>
                                        <p>{{ $item->resumo }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('LandPage.videos')

@endsection

