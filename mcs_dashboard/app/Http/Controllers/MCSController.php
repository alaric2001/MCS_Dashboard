<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MCS;

class MCSController extends Controller
{
    public function home()
    {
        $datamcs = MCS::all();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
        return view('tni.home', compact('datamcs'));
    }

    public function index()
    {
        $datamcs = MCS::all();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
        return view('tni.mcs_data', compact('datamcs'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $line) {
            $data = str_getcsv($line);

            MCS::create([
                'name' => $data[0],
                'price' => $data[1],
                // Add more fields as needed
            ]);
        }

        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }
}
