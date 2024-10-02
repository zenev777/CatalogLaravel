<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){

        $partners = Partner::orderBy('position', 'asc')->get();

        return view('partniori', ['partners' => $partners]);
    }
}
