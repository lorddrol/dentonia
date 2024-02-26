@extends('layout.app')
@section('title', 'Каталог')
@section('content')

    <section name="productView">
        <div class="container">
            <div class="modal fade" id="commentFormModal" aria-hidden="true" aria-labelledby="commentFormModalLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div name="comment" class="d-block">
                                <form action="{{ Route('commentadd', ['id' => $p->id]) }}"
                                    onsubmit="sendingForm(this, event)" method="post">
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <h2 class="modal-title" id="commentFormModalLabel">НАПИШИТЕ ОТЗЫВ</h2>
                                    <div class="star-add-comment mb-2" style="padding-left: 25px;">
                                        <span class="mb-1" style="color: rgba(34,34,34,.64);">Ваша оценка</span>
                                        <br>
                                        <div class="rating">
                                            <input type="radio" id="star5" name="rating" value="5">
                                            <label for="star5">&#9733;</label>
                                            <input type="radio" id="star4" name="rating" value="4">
                                            <label for="star4">&#9733;</label>
                                            <input type="radio" id="star3" name="rating" value="3">
                                            <label for="star3">&#9733;</label>
                                            <input type="radio" id="star2" name="rating" value="2">
                                            <label for="star2">&#9733;</label>
                                            <input type="radio" id="star1" name="rating" value="1">
                                            <label for="star1">&#9733;</label>
                                            <span class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                    @auth
                                    @if (isset(Auth::user()->fio))
                                    <div name="fioParent" onclick="focusInput(this)" class="background-input focused mb-4">
                                        <span class="text-plaseholder text-plaseholder-focused">ФИО</span>
                                        <input class="w-100 input" value="{{Auth::user()->fio}}" name="fio" onblur="blurInput(this)"></input>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    @else
                                    <div name="fioParent" onclick="focusInput(this)" class="background-input default mb-4">
                                        <span class="text-plaseholder text-plaseholder-default">ФИО</span>
                                        <input class="w-100 input" name="fio" onblur="blurInput(this)"></input>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    @endif
                                    <div name="EmailParent" onclick="focusInput(this)" class="background-input focused mb-4">
                                        <span class="text-plaseholder text-plaseholder-focused">Email</span>
                                        <input class="w-100 input" value="{{Auth::user()->email}}" name="Email" onblur="blurInput(this)"></input>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    @endauth
                                    @guest
                                    <div name="fioParent" onclick="focusInput(this)" class="background-input default mb-4">
                                        <span class="text-plaseholder text-plaseholder-default">ФИО</span>
                                        <input class="w-100 input" name="fio" onblur="blurInput(this)"></input>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    <div name="EmailParent" onclick="focusInput(this)" class="background-input default mb-4">
                                        <span class="text-plaseholder text-plaseholder-default">Email</span>
                                        <input class="w-100 input" name="email" onblur="blurInput(this)"></input>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    @endguest

                                    <div name="commentParent" onclick="focusInput(this)"
                                        class="background-textarea default">
                                        <span class="text-plaseholder text-plaseholder-default">Комментарий</span>
                                        <textarea class="w-100 textarea" name="comment" onblur="blurInput(this)" cols="20" rows="3"></textarea>
                                        <span class="invalid-feedback"></span>
                                    </div>

                                    {{-- переход для ввода пароля --}}
                                    <button type="submit" class="btn btn-outline-primary btn-form-reg">Продолжить</button>

                                </form>
                            </div>
                        </div>
                            <div class="modal-footer" name="modalFooter">
                                <span class="model-agreement">Используя этот сайт, вы автоматически создаете или используете
                                    имеющуюся учетную запись на dentonia, соглашаетесь на обработку персональных данных и
                                    принимаете
                                    условия <a class="model-agreement-a" href="">Пользовательских соглашений
                                        Dentonia</a>
                                    <span class="model-agreement-a" type="button"
                                        onclick="allModelAgreement(this)">Подробнее</span><span
                                        name="hiden-modal-footer-bla-bla" class="model-agreement d-none">, <a
                                            class="model-agreement-a" href="">Политикой
                                            конфиденциальности Dentonia</a>, даете согласие на сбор и обработку данных в
                                        соответствии с ними, в т.ч. с применением cookie файлов, средств анализа поведения
                                        пользователей, с привлечением сторонних сервисов, соглашаетесь на получение
                                        рекламно-информационных материалов от Dentonia.</span></span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mt-4" style="position: relative">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="/public/img/c1.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="/public/img/c2.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="/public/img/c3.jpg" alt=""></div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-6 mt-4">
                    <div class="d-flex justify-content-center flex-column" style="height: 100%;">
                        <h3>{{ $p->name }}</h3>
                        <h5 class="mt-3">{{ $p->price }}</h5>
                        <div class="cartOrBuy">
                            <button type="button" class="btn btn-lg btn-outline-primary mt-2 me-2">В корзину</button>
                            <button type="button" class="btn btn-lg btn-primary mt-2">купить сейчас</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="productComent">
        <div class="container">
            <div class="row">
                <div name="discription" class="col-12 col-lg-8 mt-4">
                    <div class="title-discription d-none d-lg-block">
                        <button class="btn-text focus" onclick="accordion(this,'discription')"> Описание </button>
                        /<button class="btn-text" type="button" onclick="accordion(this,'structure')"> Состав
                        </button>/<button class="btn-text" type="button" onclick="accordion(this,'application')">
                            Применение </button>/<button class="btn-text" type="button"
                            onclick="accordion(this,'advantages')"> Преимущества </span>
                    </div>
                    <div class="body-discription">
                        <button type="button" onclick="accordionM(this, 'discription')"
                            class="btn-text w-100 mt-3 mb-3 d-block d-lg-none">
                            <div class="d-flex justify-content-between">
                                <span>Описание</span>
                                <div class="array-accardion">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" hieght="25px" width="25px"
                                        viewBox="0 0 284.9 284.9" style="enable-background:new 0 0 284.9 284.9;"
                                        xml:space="preserve">
                                        <g>
                                            <path
                                                d="M282.1,76.5l-14.3-14.3c-1.9-1.9-4.1-2.9-6.6-2.9c-2.5,0-4.7,1-6.6,2.9L142.5,174.4L30.3,62.2c-1.9-1.9-4.1-2.9-6.6-2.9
                                                                    c-2.5,0-4.7,1-6.6,2.9L2.9,76.5C0.9,78.4,0,80.6,0,83.1c0,2.5,1,4.7,2.9,6.6l133,133c1.9,1.9,4.1,2.9,6.6,2.9s4.7-1,6.6-2.9
                                                                    l133.1-133c1.9-1.9,2.8-4.1,2.8-6.6C284.9,80.6,284,78.4,282.1,76.5z" />
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </button>
                        <div name="discription" class="discription d-block mt-3 mb-3">
                            <span>{{ $p->discription }}</span>
                        </div>
                        <hr class="d-block d-lg-none">
                        <button type="button" onclick="accordionM(this, 'structure')"
                            class="btn-text  w-100 mt-3 mb-3 d-block d-lg-none">
                            <div class="d-flex justify-content-between">
                                <span>Состав</span>
                                <div class="array-accardion blur">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" hieght="25px" width="25px"
                                        viewBox="0 0 284.9 284.9" style="enable-background:new 0 0 284.9 284.9;"
                                        xml:space="preserve">
                                        <g>
                                            <path
                                                d="M282.1,76.5l-14.3-14.3c-1.9-1.9-4.1-2.9-6.6-2.9c-2.5,0-4.7,1-6.6,2.9L142.5,174.4L30.3,62.2c-1.9-1.9-4.1-2.9-6.6-2.9
                                                                    c-2.5,0-4.7,1-6.6,2.9L2.9,76.5C0.9,78.4,0,80.6,0,83.1c0,2.5,1,4.7,2.9,6.6l133,133c1.9,1.9,4.1,2.9,6.6,2.9s4.7-1,6.6-2.9
                                                                    l133.1-133c1.9-1.9,2.8-4.1,2.8-6.6C284.9,80.6,284,78.4,282.1,76.5z" />
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </button>
                        <div name="structure" class="d-none mt-3 mb-3">
                            {{ $p->structure }}
                        </div>
                        <hr class="d-block d-lg-none">
                        <button type="button" onclick="accordionM(this, 'application')"
                            class="btn-text w-100 mt-3 mb-3 d-block d-lg-none">
                            <div class="d-flex justify-content-between">
                                <span>Применение</span>
                                <div class="array-accardion blur">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" hieght="25px" width="25px"
                                        viewBox="0 0 284.9 284.9" style="enable-background:new 0 0 284.9 284.9;"
                                        xml:space="preserve">
                                        <g>
                                            <path
                                                d="M282.1,76.5l-14.3-14.3c-1.9-1.9-4.1-2.9-6.6-2.9c-2.5,0-4.7,1-6.6,2.9L142.5,174.4L30.3,62.2c-1.9-1.9-4.1-2.9-6.6-2.9
                                                                    c-2.5,0-4.7,1-6.6,2.9L2.9,76.5C0.9,78.4,0,80.6,0,83.1c0,2.5,1,4.7,2.9,6.6l133,133c1.9,1.9,4.1,2.9,6.6,2.9s4.7-1,6.6-2.9
                                                                    l133.1-133c1.9-1.9,2.8-4.1,2.8-6.6C284.9,80.6,284,78.4,282.1,76.5z" />
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </button>
                        <div name="application" class="d-none mt-3 mb-3">
                            {{ $p->application }}
                        </div>
                        <hr class="d-block d-lg-none">
                        <button type="button" onclick="accordionM(this, 'advantages')"
                            class="btn-text w-100 mt-3 mb-3 d-block d-lg-none">
                            <div class="d-flex justify-content-between">
                                <span>Преимущества</span>
                                <div class="array-accardion blur">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" hieght="25px" width="25px"
                                        viewBox="0 0 284.9 284.9" style="enable-background:new 0 0 284.9 284.9;"
                                        xml:space="preserve">
                                        <g>
                                            <path
                                                d="M282.1,76.5l-14.3-14.3c-1.9-1.9-4.1-2.9-6.6-2.9c-2.5,0-4.7,1-6.6,2.9L142.5,174.4L30.3,62.2c-1.9-1.9-4.1-2.9-6.6-2.9
                                                                    c-2.5,0-4.7,1-6.6,2.9L2.9,76.5C0.9,78.4,0,80.6,0,83.1c0,2.5,1,4.7,2.9,6.6l133,133c1.9,1.9,4.1,2.9,6.6,2.9s4.7-1,6.6-2.9
                                                                    l133.1-133c1.9-1.9,2.8-4.1,2.8-6.6C284.9,80.6,284,78.4,282.1,76.5z" />
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </button>
                        <div name="advantages" class="d-none mt-3 mb-3">
                            {{ $p->advantages }}
                        </div>
                        <hr class="d-block d-lg-none">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ms-auto me-auto">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 style="font-size: 16px;">Отзывы</h4>
                        <button type="button" data-bs-target="#commentFormModal" data-bs-toggle="modal"
                            class="btn btn-lg btn-outline-primary" style="font-size: 16px;">Оставить комментарий</button>
                    </div>
                    <div class="slider-comment">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @if (isset($c))


                                    @foreach ($c as $ct)
                                        <div class="swiper-slide">
                                            <div class="card-comment">
                                                <span>{{ $ct->fio }}</span>
                                                <div class="d-flex justify-content-center mt-2 mb-2">
                                                    @for ($i = 0; $i < $ct->star; $i++)
                                                        <svg version="1.1" id="Capa_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;"
                                                            xml:space="preserve">
                                                            <style type="text/css">
                                                            </style>
                                                            <g>
                                                                <polygon class="st0"
                                                                    points="16,6.1 10,6.1 8,0 6,6.1 0,6.1 5,9.6 3,16 8,12 13,16 11,9.6 	" />
                                                            </g>
                                                        </svg>
                                                    @endfor
                                                </div>
                                                <span>{{ $ct->comment }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                <div class="swiper-slide">
                                    <div class="card-comment">
                                        <span>Здесь ещё нету комментариев. Оставте первый!</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
