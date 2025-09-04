@extends('layout.admin')

@section('title', 'изменение товара')

@section('content')
<div class="container">
    <div class="ms-auto me-auto w-50">
    <form action="{{route("admin.editproduct")}}" method="POST">
        @csrf
        <input type="number" class="d-none" id="id" name="id" value="{{ $p->id }}">
        <div class="mt-2">
        <span>Название товара</span>
        <input class=" mb-2 w-100 form-control" type="text" id="name" name="name" value="{{ $p->name }}">
        <span>Цена для пользователей</span>
        <input class="mb-2 w-100 form-control" type="number" id="price_user" name="price_user" value="{{ $p->price_user }}">
        <span>Цена для докторов</span>
        <input class="mb-2 w-100 form-control" type="number" id="price_doctor" name="price_doctor" value="{{ $p->price_doctor }}">
        <span>Описание</span>
        <input class="mb-2 w-100 form-control" type="text" id="discription" name="discription" value="{{ $p->discription }}">
        <span>Состав</span>
        <input class="mb-2 w-100 form-control" type="text" id="structure" name="structure" value="{{ $p->structure }}">
        <span>Применение</span>
        <input class="mb-2 w-100 form-control" type="text" id="application" name="application" value="{{ $p->application }}">
        <span>Преймущество</span>
        <input class="mb-2 w-100 form-control" type="text" id="advantages" name="advantages" value="{{ $p->advantages }}">
        <span>Категория</span>
        <select class="mb-2 form-select" name="category_id" id="category_id">
            @foreach ($category as $c)
                @if ($c->categories_id == null)
                    <option value="{{ $c->id }}" @if ($c->id == $p->category_id) selected @endif>{{ $c->name }}</option>
                    @foreach ($category as $c1)
                        @if ($c1->categories_id == $c->id)
                            <option value="{{ $c1->id }}" @if ($c->id == $p->category_id) selected @endif >{{$c1->name}}</option>
                        @endif
                    @endforeach
                @else
                @endif
            @endforeach
        </select>
        <div class="mt-3"><a href="{{route("admin.cataloge")}}" class="btn btn-danger me-2">не сохранять</a><button type="submit" class="btn btn-success">сохранить</button></div>

</div>
    </form>
</div>
</div>
@endsection
