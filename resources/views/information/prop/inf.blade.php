@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center;">
    <h1 class="display-3 brand-text font-weight-bold" style="background: blue; color:white">Infos sur tout les
        Locataires</h1>
    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="background: blue; color: white;">Retour</a>

    <div style="margin: 20px; border: 8px solid blue; border-radius: 10px; padding: 20px; overflow: auto;">
        <table class="table table-bordered table-striped" style="width: 100%;">
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
</div>
@endsection