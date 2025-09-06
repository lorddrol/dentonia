
@extends('layout.admin')

@section('title', 'Категория')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
        <div class="col-12 col-md-6 col-lg-8">
            <h2>Создать категорию</h2>
            <form action="">
                @csrf
                <label for="name">Название категория</label>
                <input type="text" class="form-control mt-3" id="name" name="name">
                @if($category->have_under_category == false && $empate_under_category ==true)
                <select class="mt-3 form-select" name="category_id" id="category_id"
                    aria-placeholder="Выберите Родительскую категорию">
                    @foreach ($category as $c)
                        @if ($c->categories_id == null)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @else
                        @endif
                    @endforeach
                </select>
                @endif
                <button class="btn btn-success mt-3">создать</button>
            </form>
        </div>
    </div>
    </div>
@endsection
