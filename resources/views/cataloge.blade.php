@extends('layout.app')
@section('title', 'Каталог')
@section('content')
    <section id="cataloge">
        <div class="container">
            <h1 class="title-list">Каталог</h1>

            <section id="product">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <form action="">
                            <div class="border">
                                <div>
                                    <p class="categories-name">Все категории</p>
                                    <input type="checkbox" name="" id=""> Категория 1
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 mt-2">
                                        <a href="/product/1" style="text-decoration: none;">
                                        <div class="card w-100">
                                            <img src="public/img/12.jpg" style="border-radius: 10px;" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h2 class="product-cart-name">котай</h2>
                                                <h4 class="cart-product-price">123 ₽</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
