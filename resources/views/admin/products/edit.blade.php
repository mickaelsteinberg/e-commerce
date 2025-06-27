@extends('layout')

@section('title', 'Modifier un produit')

@section('content')
<h1>Modifier le produit : {{ $product->name }}</h1>

<form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @include('admin.products.partials.form', ['product' => $product])
    
    <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
</form>
@endsection
