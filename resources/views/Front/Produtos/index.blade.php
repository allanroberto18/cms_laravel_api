@extends('Front.Base.internas')
@section('body')
    @if(count($produtos) > 0)
        <div class="blog-area1 section-light-blog mb6" id="blog" style="margin-top: 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title light">
                            <h1 class="text-uppercase">Todos os <span>Produtos</span></h1>
                            <img src="/img/icon/title-bg.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {!! Breadcrumbs::render('produtos') !!}
                    </div>
                </div>
                @foreach($produtos as $item)
                    <div class="row ">
                        <div class="news">
                            <div class="col-md-4 mt mb">
                                <img src="/img/pagina/produto/{{ $item->imagem_capa }}" class="img-responsive"
                                     alt="{{ $item->titulo }}">
                            </div>
                            <div class="col-md-8 mt mb">
                                <h3>{{ $item->retranca }}</h3>
                                <h1>
                                    {{ $item->titulo }}
                                </h1>
                                <p>{{ $item->resumo }}</p>
                                <a href="{{ route('produto.show', [ 'id' => $item->id ]) }}"
                                   class="button mt">
                                    Leia Mais <i class="fa fa-caret-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mb6 page">
                    {!! $produtos->links() !!}
                </div>
            </div>
        </div>

    @endif
@endsection