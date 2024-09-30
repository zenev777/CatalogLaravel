<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Partner;

class AboutUsController extends Controller
{
    public function index(){

        $featuredClients = Client::where("is_featured", true)->get();

        $featuredPartners = Partner::where("is_featured", true)->get();

        return view('zanas', ['featuredClients' => $featuredClients, 'featuredPartners' => $featuredPartners]); 
    }

}
