<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasisPengetahuan;
use App\Models\Dashboard;
use App\Models\Gejala;
use App\Models\HasilDiagnosa;
use App\Models\KritikSaran;
use App\Models\Penyakit;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'Dashboard';
        $penyakit = Penyakit::get();
        $gejala = Gejala::get();
        $basisPengetahuan = BasisPengetahuan::get();
        $riwayat = HasilDiagnosa::get();
        $komentar = KritikSaran::all();

        $chartData = Penyakit::leftJoin('hasil_diagnosa', 'penyakit.kode_penyakit', '=', 'hasil_diagnosa.kode_penyakit')
            ->select('penyakit.penyakit', DB::raw('COUNT(hasil_diagnosa.id) AS total_diagnosa'))
            ->groupBy('penyakit.penyakit')
            ->orderBy('total_diagnosa', 'DESC')
            ->get();

        $barChart = HasilDiagnosa::select(DB::raw('DATE(created_at) AS diagnosa_date'), DB::raw('COUNT(*) AS total_diagnoses'))
            ->groupBy('diagnosa_date')
            ->orderBy('diagnosa_date')
            ->get();

        return view('Admin.Dashboard.index',
            compact('pageTitle', 'penyakit', 'gejala', 'basisPengetahuan', 'riwayat', 'komentar', 'chartData', 'barChart'));
    }
}
