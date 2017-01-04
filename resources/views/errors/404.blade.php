<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página não localizada</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Content Wrapper. Contains page content -->
<!-- Main content -->
<section class="content mt6">
    <div class="text-center">
        <img src="{{ asset('/img/LogoWeb.png') }}" alt=""/>
    </div>

    <div class="error-page mt6">
        <h2 class="headline text-red">404</h2>

        <div class="error-content">
            <h3>
                <i class="fa fa-warning text-red"></i> Oops! Erro Inesperado.
            </h3>
            <p>
                Atenção, a página que você solicitou não pode ser localizada
                <a href="javascript:history.back()">retorne para página anterior</a>
                e tente novamente.
            </p>
            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar página">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-danger btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
<!-- /.content -->
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
