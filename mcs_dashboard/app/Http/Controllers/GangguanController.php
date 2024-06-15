<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gangguan;
use App\Models\MCS;

class GangguanController extends Controller
{
    public function index(Request $request)
    {
        // $gangguan = Gangguan::all();
        $query = Gangguan::query();

        if ($request->filled('nomor_mcs')) {
            $query->where('no_mcs','like', '%'.  $request->nomor_mcs . '%');
        }

        if ($request->filled('pic')) {
            $query->where('pic', 'like', '%' . $request->pic . '%');
        }

        if ($request->filled('no_hp_pic')) {
            $query->where('no_hp_pic', 'like', '%' . $request->no_hp_pic . '%');
        }

        if ($request->filled('ket')) {
            $query->where('ket', 'like', '%' . $request->ket . '%');
        }
        $gangguan = $query->get();

        $datamcs = MCS::all();
        return view('tni.laporan', compact('gangguan', 'datamcs'));
        // return view('tni.gangguan');
    }

    public function add(Request $request)
    {
    $no_mcs = MCS::find($request->data_mcs_id);
    if ($no_mcs) {
        Gangguan::create([
            'data_mcs_id' => $request->data_mcs_id,
            'no_mcs' => $no_mcs->no_mcs, // Asumsi 'no_mcs' adalah kolom dalam tabel 'MCS'
            'pic' => $request->pic,
            'no_hp_pic' => $request->no_hp_pic,
            'ket' => $request->ket,
        ]);
    } else {
        // Handle the case where MCS with given ID is not found
        return back()->withErrors(['data_mcs_id' => 'Data MCS tidak ditemukan']);
    }

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $rasa_kopi = Gangguan::find($id);
        $rasa_kopi->delete();
        return redirect()->back();
    }
}
