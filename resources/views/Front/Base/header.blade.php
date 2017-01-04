<header>
    <!--Mainmenu Start-->
    <div id="main-menu" class="layout-two-menu stick slideDown">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 hidden-sm hidden-xs">
                    <div class="logo floatleft">
                        <a href="/"><img src="/img/config/{{$config->logo}}" alt="{{ $config->nome }}" style="height: 62px;" /></a>
                    </div>
                </div>
                <div class="col-md-9 hidden-sm hidden-xs">
                    <div class="main-menu float-right">
                        <nav>
                            <ul>
                                @foreach($menu as $item)
                                    <li @if(Request::path() == $item->link)class="active"@endif><a href="{{ $item->link }}">{{$item->nome}}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-12 hidden-lg hidden-md">
                    <div class="mobile-menu">
                        <nav>
                            <ul>
                                @foreach($menu as $item)
                                    <li @if(Request::path() == $item->link)class="active"@endif><a href="{{ $item->link }}">{{$item->nome}}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Mainmenu-->
</header>