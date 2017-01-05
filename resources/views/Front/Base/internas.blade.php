<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sied Sistemas – Software de Gestão para Bares, Restaurantes, casas de shows em geral, Varejo, Clínicas e
        Consultório Odontológico</title>

    <meta name="description" content="Sistemas de Automação">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Neuton:400,800,700,400italic,300,200' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>

    @section('css')
        <link rel="stylesheet" href="{{ elixir('css/tema.css') }}">
    @show

    <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script>

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!--Header Area Start-->
@include('Front.Base.header')
<!--End of Header Area-->

@yield('body')

<!--Download App Area Start-->
{{--@include('LandPage.downloads')--}}
<!--Download App Area Start-->

<!--Contact Us Area Start-->
@include('LandPage.contactus')
<!--End of Contact Us Area-->

<!-- Footer Start-->
@include('base.Front.footer')
<!--End of Footer-->

@section('js')
    <script src="{{ elixir('js/tema.js') }}"></script>
@show

</body>
</html>