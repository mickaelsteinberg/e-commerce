@extends('layout')

@section('title', 'Ajouter un produit')

@section('content')
<h1>Ajouter un produit</h1>

<form method="POST" action="{{ route('admin.products.store') }}" enctype=”multipart/form-data”>
    @csrf

    @include('admin.products.partials.form', ['product' => null])
    
    <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
</form>
@endsection
