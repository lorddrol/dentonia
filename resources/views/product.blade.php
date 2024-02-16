@extends('layout.app')

@section('title', 'товар')

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
                    <h3>{{ $p->name }}</h3>
                    <h5 class="mt-3">{{ $p->price }}</h5>
                    <div class="d-flex">
                        <button type="button" class="btn btn-lg btn-outline-primary mt-2 me-2">В корзину</button>
                        <button type="button" class="btn btn-lg btn-primary mt-2">купить сейчас</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="productComent">
        <div class="container">
            <div class="row">
                <div name="discription" class="col-12 col-md-6 col-lg-9">
                    <div class="title-discription"><button type="button" class="btn-text" onclick="accordion(this,'discription')"> Описание </button>/<button class="btn-text" type="button" onclick="accordion(this,'structure')"> Состав </button>/<button class="btn-text" type="button" onclick="accordion(this,'structure')">
                            Применение </button>/<button class="btn-text" type="button" onclick="accordion(this,'structure')"> Преимущества </button></div>
                    <div class="body-discription">
                        <div name="discription" class="discription d-block">
                            <span>{{ $p->discription }}</span>
                        </div>
                        <div name="structure" class="d-none">

                        </div>
                        <div name="application" class="d-none">

                        </div>
                        <div name="advantages" class="d-none">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h4 class="mt-2">Отзывы</h4>
                <div class="slider-comment">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">Slide 1</div>
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
