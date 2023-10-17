<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //
    public function index()
    {
        $reponses = Payment::all();

        return view('photos.index', ['payments' => $reponses]);
    }
}
