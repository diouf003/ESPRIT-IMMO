@extends('layouts.app')

@section('content')
<h1 class="display-3 brand-text font-weight-bold" style="text-align: center;background:blue; color:white">REPONSES DES
    DEMANDES</h1>
<a href="{{ url()->previous() }}" class="btn btn-secondary" style="color: white; background:blue;">Retour</a>
<a href="{{ route('messa.index') }}" wire:click.prevent="goToAddReponse()" class="btn btn-primary"
    style="color: white; background: blue;">Poursuivre la demande</a>
<div style="margin: 20px; border: 8px solid blue; border-radius: 10px; overflow: auto;">
    <table class="table table-bordered table-striped" style="width: 100%;">
        <thead>
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 15%;">Nom</th>
                <th style="width: 25%;">Prenom</th>
                <th style="width: 55%;">Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reponses as $reponse)
            <tr>
                <td>{{ $reponse->id }}</td>
                <td>{{ $reponse->nom }}</td>
                <td>{{ $reponse->prenom }}</td>
                <td>{!! nl2br(e($reponse->message)) !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection