<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/stylecss.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/sliderstile.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ route('home') }}">Дентония</a>
            <div class="w-75 d-block d-lg-none">
                <form class="d-flex " role="search">
                    <input class="form-control me-2 w-100" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><img
                            src="{{ asset('public/img/magnifier-1_icon-icons.com_56924.svg') }}" class="icon-search"
                            alt=""></button>
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('admin.cataloge') }}">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route("admin.viewCategory") }}">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route("admin.viewCategory") }}">Комментарии</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route("admin.viewCategory") }}">Пользователи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route("admin.viewCategory") }}">Заказы</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" aria-disabled="true">выход</a>
                        </li>
                    @endauth
                </ul>
                <div class="d-none d-lg-block">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <img src="{{ asset('public/img/magnifier-1_icon-icons.com_56924.svg') }}"
                                class="icon-search" alt=""></button>
                    </form>
                </div>
                <div style="
            margin: 0 5px;">
                    <a href="{{ route('cartView') }}"><img
                            src="{{ asset('public/img/shoppingbasket3_114870.svg') }}" class="icon1"
                            alt=""></a>

                    <a data-bs-toggle="modal" href="#authOrReg" role="button"><img
                            src="{{ asset('public/img/account_avatar_face_man_people_profile_user_icon_123197.svg') }}"
                            class="icon2" alt=""></a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="py-3 my-4">
        <p class="text-center text-body-secondary">© 2023 Company, Inc</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="{{ asset('public/js/scripts.js') }}"></script>
    <script src="{{ asset('public/js/scriptsmechanick.js') }}"></script>
    <script src="{{ asset('public/js/ui.js') }}"></script>
    @yield('scripts')
</body>

</html>
