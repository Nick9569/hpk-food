<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HPK Food</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('./assets/vendors/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('./assets/vendors/fancybox/jquery.fancybox.min.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>

<body>
<div class="oleez-loader"></div>
<header class="oleez-header">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0e0e0f">
        <h3 style="color: white">HPK_Food</h3>
        <div class="collapse navbar-collapse" id="oleezMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" style="color: white" href="{{route('post.index')}}">Головна <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a style="color: white" class="nav-link dropdown-toggle" href="#"
                                   id="navbarDarkDropdownMenuLink"
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Категорії
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark"
                                    style="background-color: transparent;"
                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                    @foreach($categoryList as $category)
                                        <li><a class="dropdown-item bg-dark" style="color: white"
                                               href="{{route('category.post.index', $category->id)}}">{{$category->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a style="color: white" class="nav-link dropdown-toggle" href="#"
                                   id="navbarDarkDropdownMenuLink"
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Впорядкувати
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark"
                                    style="background-color: transparent;"
                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item bg-dark" style="color: white"
                                           href="{{route('post.order', 1)}}">За популярністю
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item bg-dark" style="color: white"
                                           href="{{route('post.order', 2)}}">Найближчі
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item bg-dark" style="color: white"
                                           href="{{route('post.order', 3)}}">По назві
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <form action="{{route('post.search')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group" style="width: 250px">
                                <input type="text" class="form-control w-45" name="title" placeholder="Назва посту">
                            </div>
                            <input type="submit" style="margin-left: 10px; height: 40px" class="btn btn-primary"
                                   value="Пошук">
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    @auth()
                        @if(auth()->user()->role==0)
                            <a class="nav-link" style="color: white" href="{{route('admin.main.index')}}">Кабінет
                                адміна</a>

                        @endif
                    @endauth
                    @guest()
                        <a class="nav-link" style="color: white" href="{{route('login')}}">Увійти</a>
                    @endguest
                </li>
                <li class="nav-item">
                    @guest()
                        <a class="nav-link" style="color: white" href="{{route('register')}}">Реєстрація</a>
                    @endguest
                </li>
                <li class="nav-item" style="margin-top: -2px">
                    @auth()
                        <a class="nav-link" style="color: white" href="{{route('logout')}}">Вихід</a>
                    @endauth
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="blog-grid-page">
    @yield('content')
</main>

<footer class="oleez-footer wow fadeInUp">
    <div class="container">
        <div class="footer-content">
            <div class="row">
                <div class="col-md-6">
                    <h1 style="color: #f7b500">HPK Food</h1>
                    <p class="footer-intro-text">Тут ви знайдете те, що шукаєте!</p>
                    <nav class="footer-social-links">

                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">Номер телефону</h6>
                            <p class="widget-content">+38 (0) 68 683 44 16</p>
                        </div>
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">Запитання</h6>
                            <p class="widget-content">alekseev31445@gmail.com</p>
                        </div>
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">Адрес</h6>
                            <p class="widget-content">Зарічанська 16</p>
                        </div>
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">Робочі години</h6>
                            <p class="widget-content">Будні: 09:00 - 18:00 <br> Вихідні: 11:00 - 17:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-text">
            <p class="mb-md-0">© 2022, hpkfood. Проект розробив студент групи ПІ-191 Алєксєєв Микола.</p>
            <p class="mb-0">Курсове проектування.</p>
        </div>
    </div>
</footer>

<!-- Modals -->
<!-- Off canvas social menu -->
<nav id="offCanvasMenu" class="off-canvas-menu">
    <button type="button" class="close" aria-label="Close" data-dismiss="offCanvasMenu">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="oleez-social-menu">
        <li>
            <a href="#!" class="oleez-social-menu-link">Facebook</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Instagram</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Behance</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Dribbble</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Email</a>
        </li>
    </ul>
</nav>
<!-- Full screen search box -->
<div id="searchModal" class="search-modal">
    <button type="button" class="close" aria-label="Close" data-dismiss="searchModal">
        <span aria-hidden="true">&times;</span>
    </button>
    <form action="index.html" method="get" class="oleez-overlay-search-form">
        <label for="search" class="sr-only">Search</label>
        <input type="search" class="oleez-overlay-search-input" id="search" name="search" placeholder="Search here">
    </form>
</div>
<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/wowjs/wow.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/slick-carousel/slick.min.js')}}"></script>
<script src="{{asset('assets/vendors/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    new WOW().init();
</script>
</body>

</html>
