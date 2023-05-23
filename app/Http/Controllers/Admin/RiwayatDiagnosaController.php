<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilDiagnosa;
use App\Models\Gejala;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatDiagnosaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){ // Pemilihan jika ingin melakukan pencarian
            $riwayat = HasilDiagnosa::where('nama_pasien', 'like', "%" . $request->search . "%")
            ->orwhere('solusi', 'like', "%" . $request->search . "%")
            ->paginate();
            return view('Admin.Riwayat.index', compact('riwayat'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else { // Pemilihan jika tidak melakukan pencarian
            //fungsi eloquent menampilkan data menggunakan pagination
            $riwayat = HasilDiagnosa::with('user')->get(); 
            return view('Admin.Riwayat.index', compact('riwayat'));
        }
    }

    public function show($id)
    {
        $dataDiagnosa = HasilDiagnosa::find($id)->first();

        $dataTampilan = [
            'namaPasien' => $dataDiagnosa->user->name,
            'hasil_diagnosa' => json_decode($dataDiagnosa->diagnosa),
            'solusi' => $dataDiagnosa->penyakit->solusi
        ];

        return view('Admin.Riwayat.hasil', $dataTampilan);
    }


    public function hasil($id)
    {
        $riwayat = HasilDiagnosa::where('id', $id)->first();
        return view('Admin.Riwayat.hasil', compact('riwayat'));
    }
}
