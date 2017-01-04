<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">Adm</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Administração</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                {{--<li class="dropdown messages-menu">--}}
                    {{--@include('admin.template.header.messages')--}}
                {{--</li>--}}
                {{--<!-- Notifications: style can be found in dropdown.less -->--}}
                {{--<li class="dropdown notifications-menu">--}}
                    {{--@include('admin.template.header.notifications')--}}
                {{--</li>--}}
                {{--<!-- Tasks: style can be found in dropdown.less -->--}}
                {{--<li class="dropdown tasks-menu">--}}
                    {{--@include('admin.template.header.tasks')--}}
                {{--</li>--}}
                {{--<!-- User Account: style can be found in dropdown.less -->--}}
                {{--<li class="dropdown user user-menu">--}}
                    {{--@include('admin.template.header.profile')--}}
                {{--</li>--}}
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>