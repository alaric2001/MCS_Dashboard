<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MCS;
use App\Models\Gangguan;
use DB;


class MCSController extends Controller
{
    public function home()
    {
        $datamcs = MCS::all();
        // return view('layouts.nav_user', ['cartCount' => $cartCount]);
        // Mengelompokkan data berdasarkan kategori dan menghitung jumlahnya
        $kategoriCounts = MCS::select('kategori', DB::raw('count(*) as total'))
        ->groupBy('kategori')
        ->pluck('total', 'kategori')
        ->all();

        // Mengambil data gangguan dan menghitung jumlahnya berdasarkan paket_data
        $gangguanCounts = Gangguan::join('data_mcs', 'gangguan.data_mcs_id', '=', 'data_mcs.id')
            ->select('data_mcs.paket_data', DB::raw('count(*) as total'))
            ->groupBy('data_mcs.paket_data')
            ->pluck('total', 'data_mcs.paket_data')
            ->all();

        return view('tni.home', compact('datamcs', 'kategoriCounts', 'gangguanCounts'));
    }

    public function index(Request $request)
    {
        // $datamcs = MCS::all();
        $query = MCS::query();

        if ($request->filled('nomor_mcs')) {
            $query->where('no_mcs','like', '%'.  $request->nomor_mcs . '%');
        }

        if ($request->filled('name')) {
            $query->where('nama', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('satuan')) {
            $query->where('satuan', 'like', '%' . $request->satuan . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', 'like', '%' . $request->kategori . '%');
        }

        if ($request->filled('tgl_aktif')) {
            $query->whereDate('tgl_aktif', $request->tgl_aktif);
        }

        if ($request->filled('paket_data')) {
            $query->where('paket_data', 'like', '%' . $request->paket_data . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $datamcs = $query->get();
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
