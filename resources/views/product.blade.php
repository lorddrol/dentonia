@extends('layout.app')
@section('title', 'Каталог')
@section('content')


    <section name="productView">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mt-4" style="position: relative">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="/public/img/c1.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="/public/img/c2.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="/public/img/c3.jpg" alt=""></div>
                            <div class="swiper-slide">Slide 4</div>
                            <div class="swiper-slide">Slide 5</div>
                            <div class="swiper-slide">Slide 6</div>
                            <div class="swiper-slide">Slide 7</div>
                            <div class="swiper-slide">Slide 8</div>
                            <div class="swiper-slide">Slide 9</div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-6 mt-4">
                    <div class="d-flex justify-content-center flex-column" style="height: 100%;">
                        <h3>{{ $p->name }}</h3>
                        <h5 class="mt-3">{{ $p->price }}</h5>
                        <div class="d-flex">
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
                        <button class="btn-text focus" onclick="accordion(this,'discription')"> Описание </button> /<button
                            class="btn-text" type="button" onclick="accordion(this,'structure')"> Состав </button>/<button
                            class="btn-text" type="button" onclick="accordion(this,'application')">
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
                <div class="col-12 col-lg-4 mt-4">
                    <h4 class="mt-2">Отзывы</h4>
                    <div class="slider-comment">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero
                                    quo ducimus natus quos debitis placeat</div>
                                <div class="swiper-slide">Slide 2</div>
                                <div class="swiper-slide">Slide 3</div>
                                <div class="swiper-slide">Slide 4</div>
                                <div class="swiper-slide">Slide 5</div>
                                <div class="swiper-slide">Slide 6</div>
                                <div class="swiper-slide">Slide 7</div>
                                <div class="swiper-slide">Slide 8</div>
                                <div class="swiper-slide">Slide 9</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
