@extends('layouts.app')

@section('content')
<h1 class="display-3 brand-text font-weight-bold" style="text-align: center; background: blue; color:white">Liste Des
    Demandes Des
    Locataires</h1>
<a href="{{ url()->previous() }}" class="btn " style="background: blue; color:white">Retour</a>
<a href="{{ route('admin.gestarticles.message.index') }}" class="btn " style="background: blue; color:white">Continuer</a>

<div class="table-responsive" style="border: 8px solid blue; border-radius: 10px; margin: 20px; background-size: cover; border: 8px solid blue;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Sexe</th>
                <th>Date de Naissance</th>
                <th>Lieu de Naissance</th>
                <th>Nationalite</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Adresse</th>
                <th>Statut</th>
                <th>Choix du Logement</th>
                <th>Telephone 1</th>
                <th>Email</th>
                <th>Telephone 2</th>
                <th>Piece d'Identite</th>
                <th>No. Piece d'Identite</th>
                <!-- Ajoutez d'autres colonnes au besoin -->
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->nom }}</td>
                <td>{{ $client->prenom }}</td>
                <td>{{ $client->sexe }}</td>
                <td>{{ $client->dateNaissance }}</td>
                <td>{{ $client->lieuNaissance }}</td>
                <td>{{ $client->nationalite }}</td>
                <td>{{ $client->ville }}</td>
                <td>{{ $client->pays }}</td>
                <td>{{ $client->adresse }}</td>
                <td>{{ $client->statut }}</td>
                <td>{{ $client->choixDuLogement }}</td>
                <td>{{ $client->telephone1 }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->telephone2 }}</td>
                <td>{{ $client->pieceIdentite }}</td>
                <td>{{ $client->noPieceIdentite }}</td>
                <!-- Ajoutez d'autres colonnes au besoin -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection