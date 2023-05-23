<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\BasisPengetahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class WelcomeControllerDebug extends Controller
{
    public function index()
    {
        // check if authenticated user is exist
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            }
            if (Auth::user()->role == 'user') {
                return redirect('user/penyakit');
            }
        }

        // return to landing page if not exist
        $data_penyakit = Penyakit::get();
        // return $data_penyakit;
        return view('LandingPage', compact('data_penyakit'));
    }

    public function storeKomentar(Request $request)
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
        return back();
    }

    public function diagnosa()
    {
        $data_gejala = Gejala::all();
        return view('Diagnosa.index', compact('data_gejala'));
    }

    public function dempster_shafer(Request $request)
    {
        $request->validate([
            'resultGejala' => 'required|array',
            'resultGejala.*' => 'required|string',
            'nama_pasien' => 'required',
        ]);

        $gejala_user = $request->input('resultGejala');
        $nama_pasien = $request->input('nama_pasien');

        echo "<pre>";
        echo "Gejala \n";
        print_r($gejala_user);
        echo "</pre>";


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

                $list_gejala = Gejala::whereIn('kode_gejala',$gejala_user)
                        ->select('gejala as nama_gejala', 'kode_gejala')
                        ->get();

                foreach ($list_gejala as $key => $value) {
                    $result['Gejala_Penyakit'][$key]['kode_gejala'] = $gejala_user[$key];
                    $result['Gejala_Penyakit'][$key]['nama_gejala'] = $value->nama_gejala;
                }

                $result['namaPasien'] = $nama_pasien;

                return view('Diagnosa.hasil', compact('result'));
            }
        }
    }

    public function perhitungan($data)
    {
        $x = 0;
        for ($i = 0; $i < count($data); $i++) {
            $new_data[$i][0]['daftar_penyakit'] = $data[$i]['daftar_penyakit'];
            $new_data[$i][0]['value'] = $data[$i]['belief'];

            $new_data[$i][1]['daftar_penyakit'] = [];
            $new_data[$i][1]['value'] = $data[$i]['plausibility'];

            $x++;
        }

        echo "<pre>";
        echo "Data Awal \n";
        print_r($data);
        echo "</pre>";

        echo "<pre>";
        echo "new_data \n";
        print_r($new_data);
        echo "</pre>";

        $result = $this->new_start($new_data);

        $arrResult = [];
        foreach ($result as $key => $value) {
            $arrResult[$key] = $value['value'];
        }

        $indexMaxValue = array_search(max($arrResult), $arrResult);
        $nilaiBelief = round($result[$indexMaxValue]['value'], 2);
        $persentase = (round($result[$indexMaxValue]['value'], 2) * 100) . ' %';

        echo "<pre>";
        echo "Hasil result Res \n";
        echo "Hasil result indexMaxValue $indexMaxValue \n";
        print_r($result);
        echo "</pre>";

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

        echo "<pre>";
        echo "Hasil result NEW \n";
        print_r($jsonData);
        echo "</pre>";

        die;

        return $jsonData;
    }

    public function new_start($data){
        $total_data = count($data) - 2 ;
        $hasil = [];        
        // loop for running function
        for($i = 0; $i <= $total_data; $i++ ){

            if($i == 0){
                $hasil = $this->hitung($data[$i],$data[$i + 1]);
            }else{
                $hasil = $this->hitung($hasil, $data[$i + 1]);
            }


        echo "<pre>";
        echo "NEW Hasil hasil_akhir => $i \n";
        echo "Jumlah => " . $total_data."\n";
        print_r($hasil);
        echo "</pre>";
        }

        return $hasil;
    }

    public function hitung($data1, $data2){
        $hasil_akhir = [];
        $hasil_sementara = [];

        echo "<pre>";
        echo "Data 1";
        echo json_encode($data1);
        echo "</pre>";

        echo "<pre>";
        echo "Data 2";
        echo json_encode($data2);
        echo "</pre>";

        $z = 0;
        for ($x = 0; $x < count($data1); $x++) {
            for ($y = 0; $y < count($data2); $y++) {
                $list_penyakit_data1 = $data1[$x]['daftar_penyakit'];
                $list_penyakit_data2 = $data2[$y]['daftar_penyakit'];

                echo "<pre>";
                echo "List Penyakit Data 1 Indeks x $x ".json_encode($list_penyakit_data1)." \n";
                echo "</pre>";

                echo "<pre>";
                echo "List Penyakit Data 2 Indeks y $y ".json_encode($list_penyakit_data2)." \n";
                echo "</pre>";
        

                if(count($list_penyakit_data1) != 0 && count($list_penyakit_data2) != 0){
                    $list_penyakit = array_values(array_intersect($list_penyakit_data1,$list_penyakit_data2));
                    $hasil_sementara[$z]['daftar_penyakit'] = json_encode($list_penyakit);

                    if (count($list_penyakit) == 0) {
                        $hasil_sementara[$z]['status'] = 'Kosong';
                    }

                    echo "Hasil Penyakit $z = ".json_encode($list_penyakit). "\n";

                }else{
                    $list_penyakit = array_merge($list_penyakit_data1, $list_penyakit_data2);
                    $hasil_sementara[$z]['daftar_penyakit'] = json_encode($list_penyakit);
                }


                $hasil_sementara[$z]['value'] = $data1[$x]['value'] * $data2[$y]['value'];

                $z++;
            }
        }


        echo "<pre>";
        echo "NEW Hasil Sementara \n";
        print_r($hasil_sementara);
        echo "</pre>";

        $unique_daftar_penyakit = [];

        foreach ($hasil_sementara as $item) {
            $daftar_penyakit = json_decode($item['daftar_penyakit']);
            $unique_daftar_penyakit[$item['daftar_penyakit']] = json_encode($daftar_penyakit);
        }

        $unique_daftar_penyakit = array_values($unique_daftar_penyakit);

        echo "<pre>";
        echo "NEW Uniq array \n";
        print_r($unique_daftar_penyakit);
        echo "</pre>";

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

                echo " $i => ".$hasil_akhir[$i]['value']."<br>";

            }


            $hasil_akhir[$i]['value'] = $hasil_akhir[$i]['value'] / $tetapan;
        }
        
        return $hasil_akhir;
    }

}
