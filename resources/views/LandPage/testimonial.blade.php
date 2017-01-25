@if(count($clientes) > 0)
    <div class="blog-area section-light-blog" id="cliente">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title light">
                        <h1 class="text-uppercase">Nossos <span>Clientes</span></h1>
                        <img src="/img/icon/title-bg.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($clientes as $item)
                    <div class="col-md-3 mt text-center">
                        <img src="/img/pagina/cliente/{{ $item->imagem }}" alt="{{ $item->nome }}" style="height: 180px;"/>
                        <h4 class="mt" style="color: #888888">{{ $item->nome }}</h4>
                        <h5 style="color: #888888">{{ $item->cidade }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif