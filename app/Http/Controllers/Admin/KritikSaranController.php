<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KritikSaran;

class KritikSaranController extends Controller
{
    public function index()
    {
        $kritik_saran = KritikSaran::orderBy('created_at', 'desc')->get();
        return view('Admin.kritik_saran.index', compact('kritik_saran'));
    }

    public function create()
    {
        return view('admin.kritik_saran.create');
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

        return redirect()->route('admin.kritik_saran.index')->with('success', 'Kritik & Saran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kritik_saran = KritikSaran::find($id);
        return view('admin.kritik_saran.edit', compact('kritik_saran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'komentar' => 'required'
        ]);

        $kritik_saran = KritikSaran::find($id);
        $kritik_saran->nama = $request->nama;
        $kritik_saran->komentar = $request->komentar;
        $kritik_saran->save();

        return redirect()->route('admin.kritik_saran.index')->with('success', 'Kritik & Saran berhasil diupdate');
    }

    public function destroy($id)
    {
        $kritik_saran = KritikSaran::find($id);
        $kritik_saran->delete();

        return redirect()->route('admin.kritik_saran.index')->with('success', 'Kritik & Saran berhasil dihapus');
    }
}
