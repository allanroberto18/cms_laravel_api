require('laravel-elixir-browserify-official');
require('laravel-elixir-browser-sync-simple');
require('laravel-elixir-config');
require('laravel-elixir-vue-2');

const elixir = require('laravel-elixir');

var node = './node_modules/',
    admin = node + 'admin-lte/',
    adminPlugins = admin + 'plugins/',
    assets = 'resources/assets/',
    tema = 'tema/';

elixir.config.js.browserify.watchify = {
    enabled: true,
    options: {
        poll: true
    }
}

elixir(function (mix) {
    mix.styles(
        [
            'animate.css',
            'app.css',
            'bootstrap.min.css',
            'font-awesome.min.css',
            'jquery-ui.css',
            'meanmenu.min.css',
            'owl.carousel.css',
            'responsive.css',
            'slick.css',
            'style.css',
            'nivo-slider/css/nivo-slider.css',
            'nivo-slider/css/preview.css',
            'custom.css',
            node + 'fancybox/dist/css/jquery.fancybox.css'
        ], 'public/css/tema.css');

    mix.styles(
        [
            admin + 'bootstrap/css/bootstrap.min.css',
            node + 'font-awesome/css/font-awesome.css',
            adminPlugins + 'select2/select2.css',
            adminPlugins + 'jvectormap/jquery-jvectormap-1.2.2.css',
            admin + 'dist/css/AdminLTE.css',
            admin + 'dist/css/skins/_all-skins.css',
            adminPlugins + 'datepicker/datepicker3.css',
            node + 'textangular/dist/textAngular.css',
            'custom.css'
        ], 'public/css/admin.css');

    mix.scripts(
        [
            adminPlugins + 'jQuery/jquery-2.2.3.min.js',
            admin + 'bootstrap/js/bootstrap.js',
            adminPlugins + 'fastclick/fastclick.js',
            admin + 'dist/js/app.js',
            adminPlugins + 'sparkline/jquery.sparkline.js',
            adminPlugins + 'jvectormap/jquery-jvectormap-1.2.2.min.js',
            adminPlugins + 'jvectormap/jquery-jvectormap-world-mill-en.js',
            adminPlugins + 'slimScroll/jquery.slimscroll.js',
            adminPlugins + 'chartjs/Chart.js',
            adminPlugins + 'input-mask/jquery.inputmask.js',
            adminPlugins + 'input-mask/jquery.inputmask.date.extensions.js',
            adminPlugins + 'datepicker/bootstrap-datepicker.js',
            adminPlugins + 'datepicker/locales/bootstrap-datepicker.pt-BR.js',
            'custom.js',
        ], 'public/js/admin.js');

    mix.scripts(
        [
            tema + 'vendor/jquery-1.11.3.min.js',
            tema + 'bootstrap.min.js',
            tema + 'nivo-slider/jquery.nivo.slider.js',
            tema + 'nivo-slider/home.js',
            tema + 'wow.min.js',
            tema + 'jquery.meanmenu.js',
            tema + 'owl.carousel.min.js',
            tema + 'jquery.scrollUp.min.js',
            tema + 'slick.min.js',
            tema + 'jquery.nav.js',
            tema + 'plugins.js',
            node + 'fancybox/dist/js/jquery.fancybox.js',
            tema + 'main.js'
        ], 'public/js/tema.js');

    mix.copy(admin + 'dist/img', 'public/dist/img');
    mix.copy(node + 'fancybox/dist/img', 'public/img');
    mix.copy(assets + 'fonts', 'public/fonts');
    mix.copy(assets + 'js/tema/vendor/modernizr-2.8.3.min.js', 'public/js/modernizr-2.8.3.min.js');

    mix.copy(assets + 'js/app/templates', 'public/js/app/templates');
    mix.browserify(assets + 'js/app/app.js', './public/js/app/app.js').webpack(
        assets + 'js/app/app.js',
        './public/js/app'
    );

    mix.sass('app.scss')
        .webpack('app.js');

    mix.browserSync({
        proxy: 'sied.app',
        logConnections: false,
        reloadOnRestart: true,
        notify: true,
    });
});







