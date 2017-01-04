<?php

namespace App\Providers;

use App\Repositories\BannerRepository;
use App\Repositories\BannerRepositoryEloquent;
use App\Repositories\ConfigRepository;
use App\Repositories\ConfigRepositoryEloquent;
use App\Repositories\DownloadRepository;
use App\Repositories\DownloadRepositoryEloquent;
use App\Repositories\FaleConoscoAssuntoRepository;
use App\Repositories\FaleConoscoAssuntoRepositoryEloquent;
use App\Repositories\FaleConoscoRepository;
use App\Repositories\FaleConoscoRepositoryEloquent;
use App\Repositories\MenuRepository;
use App\Repositories\MenuRepositoryEloquent;
use App\Repositories\NoticiaRepository;
use App\Repositories\NoticiaRepositoryEloquent;
use App\Repositories\PaginaCaracteristicaRepository;
use App\Repositories\PaginaCaracteristicaRepositoryEloquent;
use App\Repositories\PaginaClienteRepository;
use App\Repositories\PaginaClienteRepositoryEloquent;
use App\Repositories\PaginaDepoimentoRepository;
use App\Repositories\PaginaDepoimentoRepositoryEloquent;
use App\Repositories\PaginaGaleriaFotoRepository;
use App\Repositories\PaginaGaleriaFotoRepositoryEloquent;
use App\Repositories\PaginaGaleriaRepository;
use App\Repositories\PaginaGaleriaRepositoryEloquent;
use App\Repositories\PaginaRepository;
use App\Repositories\PaginaRepositoryEloquent;
use App\Repositories\PaginaProdutoCaracteristicaRepository;
use App\Repositories\PaginaProdutoCaracteristicaRepositoryEloquent;
use App\Repositories\PaginaProdutoRepository;
use App\Repositories\PaginaProdutoRepositoryEloquent;
use App\Repositories\PaginaVideoRepository;
use App\Repositories\PaginaVideoRepositoryEloquent;
use App\Repositories\SobreNosRepository;
use App\Repositories\SobreNosRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\VideoRepository;
use App\Repositories\VideoRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            BannerRepository::class,
            BannerRepositoryEloquent::class
        );
        $this->app->bind(
            ConfigRepository::class,
            ConfigRepositoryEloquent::class
        );
        $this->app->bind(
            DownloadRepository::class,
            DownloadRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaClienteRepository::class,
            PaginaClienteRepositoryEloquent::class
        );
        $this->app->bind(
            FaleConoscoRepository::class,
            FaleConoscoRepositoryEloquent::class
        );
        $this->app->bind(
            MenuRepository::class,
            MenuRepositoryEloquent::class
        );
        $this->app->bind(
            NoticiaRepository::class,
            NoticiaRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaRepository::class,
            PaginaRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaCaracteristicaRepository::class,
            PaginaCaracteristicaRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaDepoimentoRepository::class,
            PaginaDepoimentoRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaGaleriaRepository::class,
            PaginaGaleriaRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaGaleriaFotoRepository::class,
            PaginaGaleriaFotoRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaProdutoRepository::class,
            PaginaProdutoRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaProdutoCaracteristicaRepository::class,
            PaginaProdutoCaracteristicaRepositoryEloquent::class
        );
        $this->app->bind(
            PaginaVideoRepository::class,
            PaginaVideoRepositoryEloquent::class
        );
        $this->app->bind(
            VideoRepository::class,
            VideoRepositoryEloquent::class
        );
        $this->app->bind(
            SobreNosRepository::class,
            SobreNosRepositoryEloquent::class
        );
        $this->app->bind(
            UserRepository::class,
            UserRepositoryEloquent::class
        );
    }
}
