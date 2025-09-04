<div class="row">@foreach ($products as $p)
    <div class="col-6 col-sm-6 col-md-6 col-lg-4 mt-2">
        <a href="/product/{{$p->id}}" style="text-decoration: none;">
            <div class="card w-100">
                <img src="public/img/{{ $p->img }}" style="border-radius: 10px;"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="product-cart-name">{{ $p->name }}</h2>
                    <h4 class="product-cart-price">{{ $p->price }}</h4>
                    <a href="{{route("admin.viewproduct", $p->id)}}" class="btn btn-success w-100">Изменить</a>
                    <button onclick="valDeleteProduct({{$p->id}})" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger w-100 mt-2">Удалить</button>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    </div>
