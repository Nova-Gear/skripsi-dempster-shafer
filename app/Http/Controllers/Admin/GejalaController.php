<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gejala;
use RealRashid\SweetAlert\Facades\Alert;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();

        return view('Admin.Gejala.index', compact('gejala'));
    }

    public function create()
    {
        return view('Admin.Gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|unique:gejala,kode_gejala',
            'gejala' => 'required',
        ]);

        Gejala::create($request->all());

        Alert::success('Success', 'Data Gejala Berhasil Ditambahkan');
        return redirect()->route('gejala.index');
    }

    public function show($id)
    {
        $gejala = Gejala::find($id);

        return view('Admin.Gejala.show', compact('gejala'));
    }

    public function edit($id)
    {
        $gejala = Gejala::find($id);

        return view('Admin.Gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        $gejala = Gejala::find($id);
        $request->validate([
            // 'kode_gejala' => 'required|unique:gejala,kode_gejala,' . $gejala->id,
            'gejala' => 'required',
        ]);

        $gejala->update($request->all());

        Alert::success('Success', 'Data Gejala Berhasil Diedit');
        return redirect()->route('gejala.index');
    }

    public function destroy($id)
    {
        $gejala = Gejala::find($id);
        $gejala->delete();

        Alert::success('Success', 'Data Gejala berhasil dihapus');
        return redirect()->route('gejala.index');
    }
}
