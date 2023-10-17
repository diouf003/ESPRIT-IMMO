@extends('layouts.app')

@section('content')


<h1>Envoyer un PDF à un Locataire</h1>

<form action="{{ route('add.pdf.envoyer') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="locataire_id">Sélectionnez le Locataire :</label>
        <select name="locataire_id" id="locataire_id" class="form-control">
            @foreach ($locataires as $locataire)
            <option value="{{ $locataire->id }}">{{ $locataire->nom }}</option>
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