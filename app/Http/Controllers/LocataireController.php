<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use Illuminate\Http\Request;

class LocataireController extends Controller
{
    //

    public function afficherPdf($id)
    {

        $locataire = Locataire::find($id);

        if ($locataire && $locataire->pdf_path) {
            $pdfPath = storage_path('app/public/' . $locataire->pdf_path);
            return response()->file($pdfPath);
        } else {
            return abort(404);
        }
    }
}
