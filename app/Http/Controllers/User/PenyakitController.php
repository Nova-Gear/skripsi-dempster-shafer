<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use DB;

class PenyakitController extends Controller
{
    public function index()
    {
        $data_penyakit = DB::table('penyakit')
            ->select('penyakit.id', 'penyakit.kode_penyakit', 'penyakit.penyakit', 'penyakit.solusi', 'gejala.kode_gejala', 'gejala.gejala', 'basis_pengetahuan.densitas')
            ->join('basis_pengetahuan', 'penyakit.kode_penyakit', '=', 'basis_pengetahuan.kode_penyakit')
            ->join('gejala', 'basis_pengetahuan.kode_gejala', '=', 'gejala.kode_gejala')
            ->get();

        return view('Users.Penyakit.index', compact('data_penyakit'));
    }
}
