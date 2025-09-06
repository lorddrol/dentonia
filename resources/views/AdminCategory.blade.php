@extends('layout.admin')

@section('title', 'Категория')

@section('content')
    <div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Заголовок модального окна</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <div id="editCategoryForm">
                    <form method="post" action="{{ route("admin.editCategory") }}">
                        @csrf
                        <input type="text" id="editCategoryId" name="id" class="d-none">
                        <label for="name">Название категория</label>
                        <input type="text" class="form-control mt-3" id="editCategoryName" name="name">
                        <select class="mt-3 form-select" name="category_id" id="editCategoryCategoriesId"
                            aria-placeholder="Выберите Родительскую категорию">
                            @foreach ($category as $c)
                                @if ($c->categories_id == null)
                                    <option id="{{ $c->id }}" value="{{ $c->id }}">{{ $c->name }}
                                    </option>
                                @else
                                @endif
                            @endforeach
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button class="btn btn-primary">Сохранить изменения</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Точно удалить?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-footer">
                    <div id="editCategoryForm">
                    <form action="{{ route('admin.deleteCategory') }}" method="post">
                        @csrf
                        <input style="d-none" type="text" id="id" name="id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button class="btn btn-primary">удалить</button>
                    </form></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <h1 class="mb-3">Категории</h1>
                <form action="">
                    <div id="allCategory">
                        @foreach ($category as $c)
                            @if ($c->categories_id == null)
                                <div class="d-flex justify-content-between  mt-3">
                                    <div>
                                        <input type="checkbox" onclick="(filterCategory('{{ $c->id }}'))"
                                            class="form-check-input" name="" id="{{ $c->id }}">
                                        <label for="{{ $c->id }}">{{ $c->name }}</label>
                                    </div>
                                    @if ($c->have_under_category == true)
                                        <div class="d-flex">
                                            <div>
                                                <button type="button" id="open_under_category{{ $c->id }}"
                                                    onclick="openUnderCategory({{ $c->id }})"
                                                    class="open_under_category">+</button>
                                                <button type="button" id="hiden_under_category{{ $c->id }}"
                                                    onclick="hidenUnderCategory({{ $c->id }})"
                                                    class="open_under_category d-none">-</button>
                                            </div>
                                            <button type="button"
                                                onclick="editCategory({{ $c->id }}, {{ $c->name }}, {{ $c->categories_id }})"
                                                data-bs-toggle="modal" data-bs-target="#editCategory"
                                                style="width:40px;hieght:20px; padding: 5px" class="btn btn-success"><img
                                                    style="width:20px;hieght:20px;"
                                                    src="{{ asset('public/img/edit.svg') }}" alt=""></button>
                                            <button type="button" onclick="deleteCategory({{ $c->id }})"
                                                data-bs-toggle="modal" data-bs-target="#deleteCategory"
                                                style="width:40px;hieght:20px; padding: 5px;" class="btn btn-danger"><img
                                                    style="width:20px;hieght:20px;"
                                                    src="{{ asset('public/img/clouse.svg') }}" alt=""></button>
                                        </div>
                                </div>
                                <div id="{{ $c->id }}"class="underCategory d-none">
                                    @foreach ($category as $c1)
                                        @if ($c1->categories_id == $c->id)
                                            <div class="d-flex justify-content-between ms-2 mt-3">
                                                <div>
                                                    <input type="checkbox"
                                                        onclick="(filterCategory('{{ $c1->id }}'))"
                                                        class="form-check-input" id="{{ $c1->id }}">
                                                    <label for="{{ $c1->id }}">{{ $c1->name }}</label>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        onclick="editCategory({{ $c1->id }}, {{ $c1->name }}, {{ $c1->categories_id }})"
                                                        data-bs-toggle="modal" data-bs-target="#editCategory"
                                                        style="width:40px;hieght:20px; padding: 5px"
                                                        class="btn btn-success"><img style="width:20px;hieght:20px;"
                                                            src="{{ asset('public/img/edit.svg') }}"
                                                            alt=""></button>
                                                    <button type="button" onclick="deleteCategory({{ $c1->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#deleteCategory"
                                                        style="width:40px;hieght:20px; padding: 5px;"
                                                        class="btn btn-danger"><img style="width:20px;hieght:20px;"
                                                            src="{{ asset('public/img/clouse.svg') }}"
                                                            alt=""></button>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div>
                                    <button type="button"
                                        onclick="editCategory({{ $c->id }}, {{ $c->name }}, {{ $c->categories_id }})"
                                        data-bs-toggle="modal" data-bs-target="#editCategory"
                                        style="width:40px;hieght:20px; padding: 5px" class="btn btn-success"><img
                                            style="width:20px;hieght:20px;" src="{{ asset('public/img/edit.svg') }}"
                                            alt=""></button>
                                    <button type="button" onclick="deleteCategory({{ $c->id }})"
                                        data-bs-toggle="modal" data-bs-target="#deleteCategory"
                                        style="width:40px;hieght:20px; padding: 5px;" class="btn btn-danger"><img
                                            style="width:20px;hieght:20px;" src="{{ asset('public/img/clouse.svg') }}"
                                            alt=""></button>
                                </div>
                    </div>
                    @endif
                    @endif
                    @endforeach
            </div>
            </form>
        </div>
        <div class="col-12 col-md-6 col-lg-8">
            <h2>Создать категорию</h2>
            <form action="">
                @csrf
                <label for="name">Название категория</label>
                <input type="text" class="form-control mt-3" id="name" name="name">
                <select class="mt-3 form-select" name="category_id" id="category_id"
                    aria-placeholder="Выберите Родительскую категорию">
                    @foreach ($category as $c)
                        @if ($c->categories_id == null)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @else
                        @endif
                    @endforeach
                </select>
                <button class="btn btn-success mt-3">создать</button>
            </form>
        </div>
    </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('public/js/admin.js') }}"></script>
@endsection
