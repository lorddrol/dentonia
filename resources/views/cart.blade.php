@extends('layout.app')

@section('title', 'корзина')

@section('content')

    <section class="ms-1 me-1">
        <div class="container">
            <h2>Корзина</h2>
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-8" style="margin: 20px 0;">
                    @foreach ($carts as $c)
                        <div class="row" id="cartProduct{{ $c->count }}">
                            <div class="col-4 col-lg-3 col-xl-2 img-cart"><img src="public/img/12.jpg" alt=""></div>
                            <div class="col-7 col-lg-8 col-xl-9">
                                <div class="row">
                                    <div class="col-12 col-lg-5" style="padding-left: 20px;">
                                        <span class="cart-text">
                                            {{ $c->product->name }}
                                        </span>
                                        <div class=" d-block d-xl-none">
                                            <div class="count-cart">
                                                <button class="btn-text count-cart-minus"
                                                    onclick="countChange(this, {{ $c->product_id }}, 'minus', {{$c->id}})">-</button>
                                                <div class="count-cart-count"><span>{{ $c->count }}</span></div>
                                                <button class="btn-text count-cart-plinus"
                                                    onclick="countChange(this, {{ $c->product_id }}, 'plinus', {{$c->id}})">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" d-none d-xl-block col-xl-3">
                                        <div class="count-cart">
                                            <button class="btn-text count-cart-minus"
                                                onclick="countChange(this, {{ $c->product_id }}, 'minus', {{$c->id}})">-</button>
                                            <div class="count-cart-count"><span>{{ $c->count }}</span></div>
                                            <button class="btn-text count-cart-plinus"
                                                onclick="countChange(this, {{ $c->product_id }}, 'plinus', {{$c->id}})">+</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7 col-xl-4 price-cart" style="padding-left: 20px;">
                                        <span>{{$c->product->price}} &#x20bd</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 col-lg-1 checkBoxAddCart text-center">
                                <input type="checkbox"
                                    onchange="editSummBuyCartUi(this, {{ $c->product_id }}, {{ $c->count }})"
                                    class="checkbox-item-cart" name="checkBoxBuy">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div name="itog" id="ItogBuyCartblock" class="col-lg-5 col-xl-4">
                    <h4 class="d-none d-lg-block">Оформите заказ</h4>
                    <div class="itogBuyBlock">
                        <div class="d-none d-lg-block row m-3">
                            <img src="" alt="">
                        </div>
                        <hr class="d-none d-lg-block">
                        <div class="m-3">
                            <button class="btn btn-lg btn-secondary w-100">
                                <div class="d-flex justify-content-between">
                                    <span class="text-light">К оформлению</span>
                                    <div class="d-flex">
                                        <span class="priceText text-light me-2"></span>
                                        <span style="transform: rotate(-90deg);">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" hieght="25px" width="25px"
                                                viewBox="0 0 284.9 284.9"
                                                style="enable-background:new 0 0 284.9 284.9; fill:#f8f9fa;"
                                                xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M282.1,76.5l-14.3-14.3c-1.9-1.9-4.1-2.9-6.6-2.9c-2.5,0-4.7,1-6.6,2.9L142.5,174.4L30.3,62.2c-1.9-1.9-4.1-2.9-6.6-2.9
                                                                                c-2.5,0-4.7,1-6.6,2.9L2.9,76.5C0.9,78.4,0,80.6,0,83.1c0,2.5,1,4.7,2.9,6.6l133,133c1.9,1.9,4.1,2.9,6.6,2.9s4.7-1,6.6-2.9
                                                                                l133.1-133c1.9-1.9,2.8-4.1,2.8-6.6C284.9,80.6,284,78.4,282.1,76.5z" />
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
