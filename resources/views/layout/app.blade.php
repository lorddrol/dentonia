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
    {{-- модалка --}}
    <div class="modal fade" id="authOrReg" aria-hidden="true" aria-labelledby="authOrRegLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- emai or phone --}}
                    <form action="{{ Route('auth') }}" method="post" onsubmit="sendingForm(this, event)">
                        @csrf
                        <div name="login" class="d-block">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn-close"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h2 class="modal-title" id="authOrRegLabel">Войдите в аккаунт</h2>
                            <div name="emailParent" onclick="focusInput(this)" class="background-input default">
                                <span class="text-plaseholder text-plaseholder-default">телефон или E-mail</span>
                                <input type="email" name="email" onblur="blurInput(this)" class="w-100 input">
                                <span class="invalid-feedback"></span>
                            </div>
                            {{-- переход для ввода пароля --}}
                            <button type="button" class="btn btn-outline-primary btn-form-reg"
                                onclick="nextGuide(this, 'password', 'noneEmail')">Продолжить</button>
                            <hr class="mt-2 mb-2">
                            {{-- переход переход на регистрация --}}
                            <button class="btn btn-outline-primary btn-form-reg" type="button"
                                onclick="nextGuide(this, 'regform', '')">Создать
                                аккаунт</button>
                        </div>

                        {{-- ввод пароля --}}
                        <div name="password" class="d-none">
                            <div class="d-flex justify-content-between w-100">
                                <div><button type="button" onclick="nextGuide(this, 'login', 'block')"
                                        class="btn-back"></button></div>
                                <div><button type="button"
                                        class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <h2 class="modal-title">Введите пароль</h2>
                            <div onclick="focusInput(this)" class="background-input default">
                                <span class="text-plaseholder text-plaseholder-default">Пароль</span>
                                <input type="password" name="password" onblur="blurInput(this)" class="w-100 input">
                                <span class="invalid-feedback"></span>
                            </div>
                            {{-- вход --}}
                            <button class="btn btn-outline-primary btn-form-reg" type="submit">Продолжить</button>
                        </div>
                    </form>
                    <form action="{{ Route('reg') }}" method="post" onsubmit="sendingForm(this, event)">
                        @csrf
                        {{-- форма регистрации --}}
                        <div name="regform" class="d-none">
                            <div class="d-flex justify-content-end w-100">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                            </div>
                            <h2 class="modal-title">Создайте аккаунт</h2>
                            <div onclick="focusInput(this)" class="background-input default">
                                <span class="text-plaseholder text-plaseholder-default">телефон или E-mail</span>
                                <input type="email" name="email" onblur="blurInput(this)" class="w-100 input">
                                <span class="invalid-feedback"></span>
                            </div>
                            {{-- переход для ввода пароля --}}
                            <button type="button" class="btn btn-outline-primary btn-form-reg"
                                onclick="nextGuide(this, 'regformPassword', 'noneEmail')">продолжить</button>
                            <hr class="mt-2 mb-2">
                            {{-- переход переход в вход --}}
                            <button class="btn btn-outline-primary btn-form-reg" type="button"
                                onclick="nextGuide(this, 'login', '')">У меня уже есть
                                Аккаунт</button>
                        </div>
                        {{-- пароль --}}
                        <div name="regformPassword" class="d-none">
                            <div class="d-flex justify-content-between w-100">
                                <div><button type="button" onclick="nextGuide(this, 'regform', 'block')"
                                        class="btn-back"></button></div>
                                <div><button type="button"
                                        class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <h2 class="modal-title">Ведите пароль</h2>
                            <div onclick="focusInput(this)" class="background-input default">
                                <span class="text-plaseholder text-plaseholder-default">пароль</span>
                                <input type="password" name="password" onblur="blurInput(this)" class="w-100 input">
                                <span class="invalid-feedback"></span>
                            </div>
                            {{-- окончание регистрации --}}
                            <button class="btn btn-outline-primary btn-form-reg" type="submit">продолжить</button>
                        </div>
                </div>
                </form>
                <div class="modal-footer" name="modalFooter">
                    <span class="model-agreement">Используя этот сайт, вы автоматически создаете или используете
                        имеющуюся учетную запись на dentonia, соглашаетесь на обработку персональных данных и принимаете
                        условия <a class="model-agreement-a" href="">Пользовательских соглашений Dentonia</a>
                        <span class="model-agreement-a" type="button"
                            onclick="allModelAgreement(this)">Подробнее</span><span name="hiden-modal-footer-bla-bla"
                            class="model-agreement d-none">, <a class="model-agreement-a" href="">Политикой
                            конфиденциальности Dentonia</a>, даете согласие на сбор и обработку данных в
                            соответствии с ними, в т.ч. с применением cookie файлов, средств анализа поведения
                            пользователей, с привлечением сторонних сервисов, соглашаетесь на получение
                            рекламно-информационных материалов от Dentonia.</span></span>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="w-75 d-block d-lg-none">
                <form class="d-flex " role="search">
                    <input class="form-control me-2 w-100" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><img src="{{ asset('public/img/magnifier-1_icon-icons.com_56924.svg') }}" class="icon-search"
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
                    <a class="nav-link" href="{{ Route('cataloge') }}">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Где нас найти?</a>
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
                        <img src="{{ asset('public/img/magnifier-1_icon-icons.com_56924.svg') }}" class="icon-search"
                            alt=""></button>
                </form>
            </div>
            <div style="
            margin: 0 5px;">
                <a href="{{route("cartView")}}"><img src="{{ asset('public/img/shoppingbasket3_114870.svg') }}" class="icon1" alt=""></a>

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
    <script src="{{asset('public/js/scriptsmechanick.js')}}"></script>
</body>

</html>
