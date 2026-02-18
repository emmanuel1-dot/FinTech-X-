<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients/index');
         // Affiche la vue "index" située dans le dossier "clients"
    }
}
