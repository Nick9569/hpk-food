<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#808080">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{asset('css/vendors/simplebar.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <link href="{{asset('vendors/@coreui/chartjs/css/coreui-chartjs.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script src='{{asset('plugins/chart.js/js/chart.min.js')}}'></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <title>HPK Food - Кабінет адміна</title>
</head>
<body>
<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <h3>HPK_Food</h3>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation">

        <li class="nav-title">Меню</li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.main.index')}}">
                Головна
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.user.index')}}">
                Користувачі
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.post.index')}}">
                Заклади харчування
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.category.index')}}">
                Категорії
            </a>
        </li>
    </ul>

    <a href="{{route('main.index')}}" class="btn sidebar-toggler"></a>
</div>
<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.main.index')}}"><span>Головна</span></a>
                    </li>
                    @yield('breadcrumb')
                </ol>
            </nav>
        </div>
    </header>
    <div class="main">
        @yield('content')
    </div>


</div>
<!-- CoreUI and necessary plugins-->
<style>
    .sidebar {
        height: calc(100%);
    }
</style>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/charts.js')}}"></script>
<script src="{{asset('vendors/chart.js/js/chart.min.js')}}"></script>
<script src="{{asset('vendors/@coreui/chartjs/js/coreui-chartjs.js')}}"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
