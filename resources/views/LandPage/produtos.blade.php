@if ($produtos->total() > 0)
    <div class="blog-area section-light-blog" id="produto">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title light">
                        <h1 class="text-uppercase">Nossos <span>Produtos</span></h1>
                        <img src="/img/icon/title-bg.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-carousel">
                    @foreach($produtos as $item)
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="{{ route('produto.show', ['id' => $item->id]) }}">
                                        <img src="/img/pagina/produto/{{ $item->imagem_capa }}" alt="{{ $item->titulo }}">
                                    </a>
                                </div>
                                <div class="blog-text">
                                    <h3>
                                        <a href="{{ route('produto.show', ['id' => $item->id]) }}">{{ $item->titulo }}</a>
                                    </h3>
                                    <a href="{{ route('produto.show', ['id' => $item->id]) }}" class="blog-button">
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