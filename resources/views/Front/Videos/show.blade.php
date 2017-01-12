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
                    <h4>{{ $entity->titulo }}</h4>
                    <br/>
                    <iframe width="{{ $entity->largura }}" height="{{ $entity->altura }}" src="https://www.youtube.com/embed/{{ $entity->link }}" frameborder="0" allowfullscreen></iframe>
                    <p>
                        {!!  $entity->resumo !!}
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <ul>
                    @foreach($playlist as $item)
                    <li>
                        <a href="{{ route('videos.show', [ 'slug' => $item->slug ]) }}">
                            <img src="https://img.youtube.com/vi/{{ $item->link }}/0.jpg" alt="{{ $item->titulo }}">
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

@include('LandPage.videos')

@endsection

