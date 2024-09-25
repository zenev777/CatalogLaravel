<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){

        $clients = Client::all();

        return view('clienti', ['clients' => $clients]); 
    }
}
