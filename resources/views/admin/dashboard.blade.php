@extends('layout')

@section('title', 'Tableau de bord admin')

@section('content')
    <h1 class="mb-4">Tableau de bord</h1>

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Produits</h5>
                    <p class="display-6">{{ $products->count() }}</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline btn-primary" title="Voir la liste">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5 class="card-title">Catégories</h5>
                    <p class="display-6">{{ $categories->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Valeur stock total</h5>
                    <p class="display-6">
                        {{ number_format($products->sum('price'), 2, ',', ' ') }} €
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-info">
                <div class="card-body">
                    <h5 class="card-title">Clients inscrits</h5>
                    <p class="display-6">
                        {{ number_format($clients->count()) }} clients
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Liste des produits -->
        <div class="col-md-8">
            <h2>Produits</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? 'Non classé' }}</td>
                            <td>{{ number_format($product->price, 2, ',', ' ') }} €</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="btn btn-sm btn-outline-secondary">Modifier</a>
                                <form action="#" method="POST" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Liste des catégories -->
        <div class="col-md-4">
            <h2>Catégories</h2>
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <span class="badge bg-primary rounded-pill">
                            {{ $category->products->count() }} produits
                        </span>
                    </li>
                @endforeach
            </ul>
            <hr class="my-4">
            <h2>Clients</h2>
            <ul class="list-group">
                @foreach($clients as $client)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $client->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection