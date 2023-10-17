<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class ProprietaireController extends Controller
{
    //

    public function voirPaiement()
    {
        $payments = Payment::all();

        return view('adPro.locat.index', ['payments' => $payments]);
    }
}
