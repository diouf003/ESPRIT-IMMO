@if ($locataire->pdf_path)
<a href="{{ route('locataire.pdf', ['id' => $locataire->id]) }}" target="_blank">Télécharger le PDF</a>
@else
<p>Aucun PDF disponible.</p>
@endif