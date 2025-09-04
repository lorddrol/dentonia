@extends('layout.admin')

@section('title', 'каталог админ')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Вы точно хотите удалить товар?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.deleteProduct') }}" method="post">
                        @csrf
                        <input name="id" id="inputDeleteId" value="-1" class="d-none">
                        <button type="submit" id="delteProduct" class="btn btn-danger">Удалить</button>
                    </form>
                    <button type="button" value="" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <section id="cataloge">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="title-list">Каталог</h1>
                </div>
                <div><a href="{{ route('admin.viewCreateProduct') }}" class="btn btn-primary">создать</a></div>
            </div>
            <section id="product">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <form action="">
                            <div id="allCategory">
                                <div class="d-flex justify-content-between categories-name">
                                    <div>
                                        <p>Все категории</p>
                                    </div>
                                    <div>
                                        <p>+</p>
                                    </div>
                                </div>
                                @foreach ($category as $c)
                                    @if ($c->categories_id == null)
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <input type="checkbox" onclick="(filterCategory('{{ $c->id }}'))"
                                                    class="form-check-input" name="" id="{{ $c->id }}">
                                                <label for="{{ $c->id }}">{{ $c->name }}</label>
                                            </div>
                                            @if ($c->have_under_category == true)
                                                <button type="button" id="open_under_category{{ $c->id }}"
                                                    onclick="openUnderCategory({{ $c->id }})"
                                                    class="open_under_category">+</button>
                                                <button type="button" id="hiden_under_category{{ $c->id }}"
                                                    onclick="hidenUnderCategory({{ $c->id }})"
                                                    class="open_under_category d-none">-</button>
                                        </div>
                                        <div id="{{ $c->id }}"class="underCategory d-none">
                                            @foreach ($category as $c1)
                                                @if ($c1->categories_id == $c->id)
                                                    <div class="ms-2">
                                                        <input type="checkbox"
                                                            onclick="(filterCategory('{{ $c1->id }}'))"
                                                            class="form-check-input" id="{{ $c1->id }}">
                                                        <label for="{{ $c1->id }}">{{ $c1->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                            </div>
                            @endif
                            @endif
                            @endforeach
                    </div>
                    </form>
                </div>
                <div class="col-12 col-lg-9">
                    <div id="products">
                        @include('patern.Adminproducts', ['products' => $products])
                    </div>
                </div>
        </div>
    </section>
    </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('public/js/admin.js') }}"></script>
@endsection
