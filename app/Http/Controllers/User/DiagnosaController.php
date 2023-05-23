<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BasisPengetahuan;
use App\Models\Gejala;
use App\Models\HasilDiagnosa;
use App\Models\Penyakit;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnosaController extends Controller
{
    public function index()
    {
        $data_gejala = Gejala::all();
        return view('Users.Diagnosa.index', compact('data_gejala'));
    }

    public function hasil($id)
    {
        $hasil_diagnosa = HasilDiagnosa::find($id);
        $hasil_diagnosa->diagnosa = json_decode($hasil_diagnosa->diagnosa);
        return view('Users.Diagnosa.hasil', compact('hasil_diagnosa'));
    }

    public function riwayat()
    {
        $data_diagnosa = HasilDiagnosa::get();

        $data_penyakit = Penyakit::select('kode_penyakit', 'penyakit', 'solusi')->get();

        $riwayat_diagnosa = [];
        foreach ($data_diagnosa as $key => $value) {
            $diagnosa = json_decode($value->diagnosa);
            $riwayat_diagnosa[$key]['id'] = $value->id;
            $riwayat_diagnosa[$key]['kode_penyakit'] = $value->kode_penyakit;
            $riwayat_diagnosa[$key]['nama_penyakit'] = $data_penyakit->where('kode_penyakit', $value->kode_penyakit)->pluck('penyakit')->first();
            $riwayat_diagnosa[$key]['presentase'] = $diagnosa->persentase_penyakit;
            $riwayat_diagnosa[$key]['solusi'] = $data_penyakit->where('kode_penyakit', $value->kode_penyakit)->pluck('solusi')->first();
        }

        return view('Users.Diagnosa.riwayat', compact('riwayat_diagnosa'));
    }

    public function dempster_shafer(Request $request){
        $request->validate([
            'resultGejala' => 'required|array',
            'resultGejala.*' => 'required|string',
        ]);

        $gejala_user = $request->input('resultGejala');

        if ($gejala_user == null) {
            Alert::error('Error', 'Anda belum memilih gejala');
            return back()->withInput();
        } else {
            $total_penyakit = 2;
            $total_gejala = count($gejala_user);
            if ($total_gejala < $total_penyakit) {
                Alert::error('Error', 'Minimal gejala yang dipilih adalah ' . ($total_penyakit) . ' gejala');
                return back()->withInput();
            } else {
                // ambil data basis pengetahuan
                $data_pengetahuan = DB::table('basis_pengetahuan')
                    ->select('kode_penyakit', 'kode_gejala', 'densitas')
                    ->get();

                $base_data = [];
                $list_gejala = [];

                // loop each data gejala
                foreach ($gejala_user as $key => $value) {
                    // Initialize variables for maximum densitas
                    $max_densitas = 0;
                    $plausibility = 0;
                    $daftar_penyakit = [];

                    // Find the maximum densitas for the current gejala
                    foreach ($data_pengetahuan as $pengetahuan) {
                        if ($pengetahuan->kode_gejala === $value) {
                            $daftar_penyakit[] = $pengetahuan->kode_penyakit;
                            $densitas = floatval($pengetahuan->densitas);
                            if ($densitas > $max_densitas) {
                                $max_densitas = $densitas;
                            }
                        }
                    }

                    $plausibility = 1 - $max_densitas;

                    $base_data[$key]['daftar_penyakit'] = $daftar_penyakit;
                    $base_data[$key]['belief'] = $max_densitas;
                    $base_data[$key]['plausibility'] = $plausibility;
                }

                $result = $this->perhitungan($base_data);

                $list_gejala = Gejala::whereIn('kode_gejala', $gejala_user)
                    ->select('gejala as nama_gejala', 'kode_gejala')
                    ->get();

                foreach ($list_gejala as $key => $value) {
                    $result['Gejala_Penyakit'][$key]['kode_gejala'] = $gejala_user[$key];
                    $result['Gejala_Penyakit'][$key]['nama_gejala'] = $value->nama_gejala;
                }

                $result_diagnosa = [
                    'nama_penyakit' => $result['Nama_Penyakit'],
                    'nilai_belief' => $result['Nilai_Belief_Penyakit'],
                    'persentase_penyakit' => $result['Persentase_Penyakit'],
                    'gejala_penyakit' => $result['Gejala_Penyakit']
                ];

                $diagnosa = new HasilDiagnosa();
                $diagnosa->id_user = Auth::id();
                $diagnosa->kode_penyakit = $result['Kode_Penyakit'];
                $diagnosa->diagnosa = json_encode($result_diagnosa);
                $diagnosa->save();
                $id_diagnosa = $diagnosa->id;

                return redirect()->route('user.diagnosa.hasil', ['id' => $id_diagnosa]);
            }
        }
    }

    public function perhitungan($data){
        $x = 0;
        for ($i = 0; $i < count($data); $i++) {
            $new_data[$i][0]['daftar_penyakit'] = $data[$i]['daftar_penyakit'];
            $new_data[$i][0]['value'] = $data[$i]['belief'];
            $new_data[$i][1]['daftar_penyakit'] = [];
            $new_data[$i][1]['value'] = $data[$i]['plausibility'];

            $x++;
        }

        $result = $this->new_start($new_data);

        $arrResult = [];
        foreach ($result as $key => $value) {
            $arrResult[$key] = $value['value'];
        }

        $indexMaxValue = array_search(max($arrResult), $arrResult);
        $nilaiBelief = round($result[$indexMaxValue]['value'], 2);
        $persentase = (round($result[$indexMaxValue]['value'], 2) * 100) . ' %';

        $kodePenyakit = $result[$indexMaxValue]['daftar_penyakit'][0];

        $dataPenyakit = Penyakit::where('kode_penyakit', $kodePenyakit)
            ->first();

        $jsonData = [
            'Kode_Penyakit' => $dataPenyakit->kode_penyakit,
            'Nama_Penyakit' => $dataPenyakit->penyakit,
            'Nilai_Belief_Penyakit' => $nilaiBelief,
            'Persentase_Penyakit' => $persentase,
            'Solusi_Penyakit' => $dataPenyakit->solusi,
        ];

        return $jsonData;
    }

    public function new_start($data){
        $total_data = count($data) - 2;
        $hasil = [];

        // loop for running function
        for ($i = 0; $i <= $total_data; $i++) {
            if ($i == 0) {
                $hasil = $this->hitung($data[$i], $data[$i + 1]);
            } else {
                $hasil = $this->hitung($hasil, $data[$i + 1]);
            }
        }

        return $hasil;
    }

    public function hitung($data1, $data2){
        $hasil_akhir = [];
        $hasil_sementara = [];

        $z = 0;
        for ($x = 0; $x < count($data1); $x++) {
            for ($y = 0; $y < count($data2); $y++) {
                $list_penyakit_data1 = $data1[$x]['daftar_penyakit'];
                $list_penyakit_data2 = $data2[$y]['daftar_penyakit'];

                if (count($list_penyakit_data1) != 0 && count($list_penyakit_data2) != 0) {
                    $list_penyakit = array_values(array_intersect($list_penyakit_data1, $list_penyakit_data2));
                    $hasil_sementara[$z]['daftar_penyakit'] = json_encode($list_penyakit);

                    if (count($list_penyakit) == 0) {
                        $hasil_sementara[$z]['status'] = 'Kosong';
                    }
                } else {
                    $list_penyakit = array_merge($list_penyakit_data1, $list_penyakit_data2);
                    $hasil_sementara[$z]['daftar_penyakit'] = json_encode($list_penyakit);
                }

                $hasil_sementara[$z]['value'] = $data1[$x]['value'] * $data2[$y]['value'];

                $z++;
            }
        }

        $unique_daftar_penyakit = [];

        foreach ($hasil_sementara as $item) {
            $daftar_penyakit = json_decode($item['daftar_penyakit']);
            $unique_daftar_penyakit[$item['daftar_penyakit']] = json_encode($daftar_penyakit);
        }

        $unique_daftar_penyakit = array_values($unique_daftar_penyakit);

        $tetapan = 0;
        foreach ($hasil_sementara as $datahasil) {
            if (isset($datahasil['status']) && $datahasil['status'] == 'Kosong') {
                $tetapan += $datahasil['value'];
            }
        }

        $tetapan = 1 - $tetapan;

        for ($i = 0; $i < count($unique_daftar_penyakit); $i++) {
            $decode[$i] = json_decode($unique_daftar_penyakit[$i]);
            $hasil_akhir[$i]['daftar_penyakit'] = $decode[$i];
            $hasil_akhir[$i]['value'] = 0;

            for ($x = 0; $x < count($hasil_sementara); $x++) {
                $array[$x] = json_decode($hasil_sementara[$x]['daftar_penyakit']);
                if ($decode[$i] == $array[$x]) {
                    if (!isset($hasil_sementara[$x]['status'])) {
                        $hasil_akhir[$i]['value'] += $hasil_sementara[$x]['value'];
                    }
                }
            }
            $hasil_akhir[$i]['value'] = $hasil_akhir[$i]['value'] / $tetapan;
        }

        return $hasil_akhir;
    }
}
