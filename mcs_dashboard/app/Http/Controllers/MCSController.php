<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MCS;

class MCSController extends Controller
{
    public function index()
    {
        $datamcs = MCS::all();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
        return view('tni.mcs_data', compact('datamcs'));
    }
}
