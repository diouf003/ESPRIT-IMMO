@extends('layouts.app')
<!-- Assurez-vous d'avoir une mise en page appropriée dans resources/views/layouts -->

@section('content')
<h1 class="display-3 brand-text font-weight-bold" style="text-align: center;background:blue; color:white">Liste des
    paiements</h1>
<a href="{{ url()->previous() }}" class="btn btn-secondary" style="background:blue; color:white">Retour</a>
<a href="{{ route('admin.gestarticles.message.index') }}" style="background:blue; color:white"></a>

<table class="table" style=" border: 2px solid blue; border-radius: 10px;  margin: 20px; background-size:
    cover; border: 8px solid blue; background-image: url('img/cfa.jpg');">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Montant Payé/ Fcfa</th>
            <th>Date Paiement</th>

            <!-- Ajoutez d'autres colonnes au besoin -->
        </tr>
    </thead>
    <tbody>
        @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->id }}</td>
            <td>{{ $payment->nom }}</td>
            <td>{{ $payment->prenom }}</td>
            <td>{{ $payment->telephone }}</td>
            <td>{{ $payment->montantPaye }}</td>
            <td>{{ $payment->datePaiement }}</td>

            <!-- Ajoutez d'autres colonnes au besoin -->
        </tr>
        @endforeach
    </tbody>
</table>
@endsection