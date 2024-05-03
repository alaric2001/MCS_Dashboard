<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gangguan;

class GangguanController extends Controller
{
    public function index()
    {
        $gangguan = Gangguan::all();
        return view('tni.laporan', compact('gangguan'));
        // return view('tni.gangguan');
    }
}
