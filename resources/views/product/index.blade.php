@extends('layout')

@section('title', 'Tous les produits')

@section('content')
    <h1 class="mb-4">Tous les produits</h1>

    @if($products->isEmpty())
        <div class="alert alert-info">Aucun produit disponible pour le moment.</div>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if($product->image)
                            <img src="{{ str_contains($product->image, 'https') ? $product->image : asset('storage/' . $product->image) }}"
                                class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Sans+Image" class="card-img-top" alt="Sans image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted mb-1">
                                Catégorie : {{ $product->category->name ?? 'Non classé' }}
                            </p>
                            <p class="card-text flex-grow-1">{{ Str::limit($product->description, 100) }}</p>
                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                <a href="{{ route('product.show', $product) }}" class="card-link">Voir plus</a>
                                <span class="fw-bold">{{ number_format($product->price, 2, ',', ' ') }} €</span>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Ajouter au panier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection