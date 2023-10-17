<?php

namespace App\Http\Controllers;

use App\Models\Nouvel;
use Illuminate\Http\Request;

class NouvellePageController extends Controller
{
    //
    public function index()
    {
        $reponses = Nouvel::all();

        return view('reponses.index', ['reponses' => $reponses]);
    }
}
