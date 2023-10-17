@extends('layouts.app')

@section('content')
<h1>Envoyer un PDF à un client (Client)</h1>

<form action="{{ route('administration.envoyer') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="client_id">Sélectionnez le client (Client) :</label>
        <select name="client_id" id="client_id" class="form-control">
            @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="pdf">Sélectionnez le PDF :</label>
        <input type="file" name="pdf" id="pdf" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary">Envoyer PDF</button>
</form>
@endsection