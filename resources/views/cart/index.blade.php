@extends('layout')

@section('title', 'Mon panier')

@section('content')
    <h1 class="mb-4">Mon panier</h1>

    @if(empty($cart))
        <div class="alert alert-info">Votre panier est vide.</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php $subtotal = $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price'], 2, ',', ' ') }} €</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($subtotal, 2, ',', ' ') }} €</td>
                    </tr>
                    @php $total += $subtotal; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total :</th>
                    <th>{{ number_format($total, 2, ',', ' ') }} €</th>
                </tr>
            </tfoot>
        </table>
    @endif
@endsection
