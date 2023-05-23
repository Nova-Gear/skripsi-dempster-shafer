<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BasisPengetahuan;
use App\Models\Gejala;
use App\Models\Penyakit;
use RealRashid\SweetAlert\Facades\Alert;

class BasisPengetahuanController extends Controller
{
    public function index()
    {
        $basis_pengetahuan = BasisPengetahuan::all();
        return view('Admin.BasisPengetahuan.index', compact('basis_pengetahuan'));
    }

    public function create()
    {
        $data_gejala = Gejala::all();
        $data_penyakit = Penyakit::all();
        return view('Admin.BasisPengetahuan.create', compact('data_gejala', 'data_penyakit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penyakit' => 'required',
            'kode_gejala' => 'required',
            'densitas' => 'required|numeric|min:0|max:1',
        ]);

        BasisPengetahuan::create($request->all());

        Alert::success('Success', 'Data Basis Pengetahuan Berhasil Ditambahkan');
        return redirect()->route('basis_pengetahuan.index');
    }

    public function edit($id)
    {
        $basis_pengetahuan = BasisPengetahuan::find($id);
        $data_gejala = Gejala::all();
        $data_penyakit = Penyakit::all();
        return view('Admin.BasisPengetahuan.edit', compact('basis_pengetahuan', 'data_gejala', 'data_penyakit'));
    }

    public function update(Request $request, $id)
    {
        $basis_pengetahuan = BasisPengetahuan::find($id);
        $request->validate([
            'kode_penyakit' => 'required',
            'kode_gejala' => 'required',
            'densitas' => 'required|numeric|min:0|max:1',
        ]);

        $basis_pengetahuan->update($request->all());

        Alert::success('Success', 'Data Basis Pengetahuan Berhasil Diedit');
        return redirect()->route('basis_pengetahuan.index');
    }

    public function destroy($id)
    {
        $basis_pengetahuan = BasisPengetahuan::find($id);
        $basis_pengetahuan->delete();

        Alert::success('Success', 'Data Basis Pengetahuan berhasil dihapus');
        return redirect()->route('basis_pengetahuan.index');
    }
}
