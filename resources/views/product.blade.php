@extends('layout.app')

@section('title', 'товар')

@section('content')


<section name="productView">
<div class="container">
    <div class="row">
        <div class="col-12 col-md-7 col-lg-6" style="position: relative">
            <div class="gallery-container">
                <div class="swiper-container gallery-main">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="gallery-title">Vertical<br>Swiper</div>
                      <img src="/public/img/1.jpeg" alt="Slide 01">
                    </div>
                    <div class="swiper-slide">
                      <div class="gallery-title">Slide 02</div>
                      <img src="/public/img/12.jpg" alt="Slide 02">
                    </div>
                    <div class="swiper-slide">
                      <div class="gallery-title">Slide 03</div>
                      <img src="/public/img/123.webp" alt="Slide 03">
                    </div>
                  </div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="public/img/1.jpeg" alt="Slide 01"></div>
                    <div class="swiper-slide">
                      <img src="public/img/12.jpg" alt="Slide 02"></div>
                    <div class="swiper-slide">
                      <img src="public/img/123.webp" alt="Slide 03"></div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-12 col-md-5 col-lg-6">

        </div>
    </div>
</div>
</section>


@endsection

