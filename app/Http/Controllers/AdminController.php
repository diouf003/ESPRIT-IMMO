<?php

namespace App\Http\Controllers;

// use App\Models\Client;
use App\Models\Client;
use App\Models\Locataire;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //


    //Methode pour afficher le PDF
    // public function afficherPdf($id)
    // {
    //     $client = Client::find($id);

    //     return view('clients.pdf', ['client' => $client]);
    // }


    public function afficherClients()
    {
        $clients = Client::all();

        return view('admin.clients.index', ['clients' => $clients]);
    }


    ///Voir demande des réponses
    public function voirDemandes()
    {
        $reponses = Reponse::all();

        return view('reponses.index', ['reponses' => $reponses]);
    }


    ///modePaiement

    public function modePaiement()
    {
        $reponses = Reponse::all();

        return view('reponses.index', ['reponses' => $reponses]);
    }
}
