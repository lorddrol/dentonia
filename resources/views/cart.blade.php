@extends('layout.app')

@section('title', 'корзина')

@section('content')

    <section>
        <div class="container">
            <h1>Корзина</h1>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="row">
                        <div class="col-5 col-md-3 img-cart"><img src="public/img/12.jpg" alt=""></div>
                        <div class="col-6 col-md-8">
                            <div class="row">
                                <div class="col-12 col-md-6"><span class="cart-text">ЗУБНАЯ ЩЕТКА ULTRASOFT CS546032qwewrqweqwe</span></div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12 col-md-5 count-cart">
                                            <button class="btn-text count-cart-minus">-</button>
                                            <div class="count-cart-count"><span>1</span></div>
                                            <button class="btn-text count-cart-plinus">+</button>
                                        </div>
                                        <div class="col-12 col-md-7 price-cart text-center">
                                            <span>123 &#x20bd</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 col-md-1 checkBoxAddCart text-center">
                            <input type="checkbox" class="checkbox-item-cart" name="" id="">
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">

                </div>
            </div>
        </div>
    </section>


@endsection
