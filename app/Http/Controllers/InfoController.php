<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //
    //infos pour le pro

    public function infos()
    {
        $clients = Client::all();

        return view('information.prop.inf', ['clients' => $clients]);
    }
}
