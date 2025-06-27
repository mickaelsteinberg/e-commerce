@extends('layout')

@section('title', 'Toutes les catégories')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Toutes les catégories</h1>
        @foreach($categories as $category)
            <h2 class="mt-5">{{ $category->name }}</h2>
            <div class="position-relative">
                <!-- Flèche gauche -->
                <span class="position-absolute top-50 start-0 translate-middle-y bg-white shadow rounded-circle p-2 d-none d-md-inline" style="z-index:2; cursor:pointer; left:-20px;" onclick="scrollRow(this, -300)">
                    <i class="fas fa-chevron-left"></i>
                </span>
                <!-- Flèche droite -->
                <span class="position-absolute top-50 end-0 translate-middle-y bg-white shadow rounded-circle p-2 d-none d-md-inline" style="z-index:2; cursor:pointer; right:-20px;" onclick="scrollRow(this, 300)">
                    <i class="fas fa-chevron-right"></i>
                </span>
                <div class="row flex-row flex-nowrap overflow-auto pb-3" style="scroll-behavior:smooth;">
                    @forelse($category->products->take(6) as $product)
                        <div class="col-8 col-sm-4 col-md-3 col-lg-2">
                            <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none text-dark">
                                <div class="card h-100">
                                    @if($product->image)
                                        <img src="{{ str_contains($product->image, 'https') ? $product->image : asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
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
                        <p class="text-muted">Aucun produit dans cette catégorie.</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>

    @push('scripts')
    <script>
        function scrollRow(element, amount) {
            const row = element.parentElement.querySelector('.row');
            row.scrollBy({ left: amount, behavior: 'smooth' });
        }
    </script>
    @endpush
@endsection