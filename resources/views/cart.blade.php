@extends('layout.app')

@section('title', 'корзина')

@section('content')

    <section>
        <div class="container">
            <h1>Корзина</h1>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="row">
                        <div class="col-9 col-md-3"><img src="public/img/12.jpg" class="w-100" alt=""></div>
                        <div class="col-6 col-md-9">
                            <div class="d-flex">
                                <div><span>ЗУБНАЯ ЩЕТКА ULTRASOFT CS546032qwewrqweqwe</span></div>
                                <div class="d-flex"> <button>-</button>
                                    <span>1</span>
                                    <button>+</button>
                                </div>
                                <div>
                                    <span>123 &#x20bd</span>
                                </div>
                                <div>
                                    <input type="checkbox" name="" id="">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">

                </div>
            </div>
        </div>
    </section>


@endsection
