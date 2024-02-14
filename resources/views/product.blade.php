@extends('layout.app')

@section('title', 'товар')

@section('content')


    <section name="productView">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mt-4" style="position: relative">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide"><img src="/public/img/1.jpeg" alt=""></div>
                          <div class="swiper-slide"><img src="/public/img/12.jpg" alt=""></div>
                          <div class="swiper-slide"><img src="/public/img/123.webp" alt=""></div>
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
                    <h3>{{$p->name}}</h3>
                    <h5 class="mt-3">{{$p->price}}</h5>
                    <div class="d-flex">
                            <button type="button" class="btn btn-lg btn-outline-primary mt-2 me-2">В корзину</button>
                            <button type="button" class="btn btn-lg btn-primary mt-2">купить сейчас</button>
                    </div>
                    <h5 style="font-weight:300;" class="mt-3">{{$p->discription}}</h5>
                </div>
            </div>
        </div>
    </section>
    <section id="productComent">
        <div class="container">
            <h4 class="mt-2">Отзывы</h4>
            
        </div>
    </section>
@endsection
