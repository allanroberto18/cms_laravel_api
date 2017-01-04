<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $titulo }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/app/app.js') }}"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini" ng-app="app">
<!-- Site wrapper -->
<div class="wrapper">

    <!-- cabeçalho -->
    @include('admin.template.header')

    <!-- menu lateral -->
    @include('admin.template.menu')

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- breadcrumb -->
        {{--@include('admin.template.breadcrumbs')--}}

        <!-- Main content -->
        <section class="content">
            @include('admin.template.body')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admin.template.footer')

    <!-- Control Sidebar -->
    @include('admin.template.aside')
</div>
<!-- ./wrapper -->
</body>
</html>
