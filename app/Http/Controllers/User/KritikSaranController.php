<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KritikSaran;
use RealRashid\SweetAlert\Facades\Alert;

class KritikSaranController extends Controller
{
    public function index()
    {
        $kritik_saran = KritikSaran::orderBy('created_at', 'desc')->get();
        return view('Users.kritik_saran.index', compact('kritik_saran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'komentar' => 'required'
        ]);

        $kritik_saran = new KritikSaran();
        $kritik_saran->nama = $request->nama;
        $kritik_saran->komentar = $request->komentar;
        $kritik_saran->save();

        Alert::success('Success', 'Kritik & Saran Berhasil Ditambahkan');
        return redirect()->route('user.komentar.index');
    }
}
