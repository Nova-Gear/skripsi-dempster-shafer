<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('Admin.Penyakit.index', compact('penyakit'));
    }

    public function create()
    {
        return view('Admin.Penyakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakit,kode_penyakit',
            'penyakit' => 'required',
            'solusi_penyakit' => 'required', // Update the validation rule
            'deskripsi' => 'required',
        ], [
            'solusi_penyakit.required' => 'The solusi field is required.', // Set custom error message
        ]);
    
        $requestData = $request->all();
        $requestData['solusi'] = json_encode($requestData['solusi_penyakit']); // Assign the value to 'solusi'
    
        unset($requestData['solusi_penyakit']); // Remove the 'solusi_penyakit' from the request data
    
        Penyakit::create($requestData);

        Alert::success('Success', 'Data Penyakit Berhasil Ditambahkan');
        return redirect()->route('penyakit.index');
    }

    public function show($id)
    {
        $penyakit = Penyakit::find($id);
        return view('Admin.Penyakit.show', compact('penyakit'));
    }

    public function edit($id)
    {
        $penyakit = Penyakit::find($id);
        return view('Admin.Penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, $id)
    {
        $penyakit = Penyakit::find($id);

        $request->validate([
            // 'kode_penyakit' => 'required|unique:penyakit,kode_penyakit,' . $penyakit->id,
            'penyakit' => 'required',
            'solusi' => 'required',
            'deskripsi' => 'required',
        ]);

        $penyakit->update($request->all());

        Alert::success('Success', 'Data Penyakit Berhasil Diedit');
        return redirect()->route('penyakit.index');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::find($id);
        $penyakit->delete();
        Alert::success('Success', 'Data Penyakit berhasil dihapus');
        return redirect()->route('penyakit.index');
    }
}
