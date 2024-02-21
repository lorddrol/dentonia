@extends('layout.app')

@section('title', 'корзина')

@section('content')

    <section class="ms-1 me-1">
        <div class="container">
            <h1>Корзина</h1>
            <div class="row">
                <div class="col-12 col-lg-8 col-lg-9">
                    <div class="row">
                        <div class="col-5 col-lg-3 img-cart"><img src="public/img/12.jpg" alt=""></div>
                        <div class="col-6 col-lg-8">
                            <div class="row">
                                <div class="col-12 col-lg-5"><span class="cart-text">ЗУБНАЯ ЩЕТКА ULTRASOFT
                                        CS546032qwewrqweqwe</span>
                                        <div class=" d-block d-xl-none">
                                        <div class="count-cart">
                                            <button class="btn-text count-cart-minus">-</button>
                                            <div class="count-cart-count"><span>29</span></div>
                                            <button class="btn-text count-cart-plinus">+</button>
                                        </div></div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="d-none d-xl-block">
                                    <div class="count-cart">
                                        <button class="btn-text count-cart-minus">-</button>
                                        <div class="count-cart-count"><span>29</span></div>
                                        <button class="btn-text count-cart-plinus">+</button>
                                    </div>
                                </div>
                                </div>
                                <div class="col-12 col-lg-4 price-cart">
                                    <span>123423 &#x20bd</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 col-lg-1 checkBoxAddCart text-center">
                            <input type="checkbox" onclick="addBuyCart(this, 1, 3)" class="checkbox-item-cart" name="checkBoxBuy">
                        </div>

                    </div>
                </div>
                <div name="itog" class="col-12 col-md-4 col-lg-3">
                    <h4>Оформите заказ</h4>
                    <div class="border p-3">
                        <div class="row">
                            <img src="" alt="">
                        </div>
                        <hr>
                        <div>
                            <button class="btn btn-lg btn-primary w-100">1</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
