@extends('layout')

@section('title', $category->name)

@section('content')
    <h1 class="mb-4">{{ $category->name }}</h1>
    <div class="row flex-row flex-nowrap overflow-auto pb-3">
        @forelse($category->products as $product)
            <div class="col-8 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/150x150?text=Image" class="card-img-top" alt="Image manquante">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text fw-bold">{{ number_format($product->price, 2, ',', ' ') }} €</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p>Aucun produit dans cette catégorie.</p>
        @endforelse
    </div>
@endsection