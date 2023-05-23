<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilDiagnosa extends Model
{
    // protected $table = 'tabel_hasil_diagnosa';
    // protected $primaryKey = 'id_hasil_diagnosa';
    // protected $fillable = [
    //     'nama_pasien',
    //     'diagnosa',
    //     'solusi'
    // ];


    protected $table = 'hasil_diagnosa';
    protected $fillable = ['id_user', 'kode_penyakit', 'diagnosa'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit', 'kode_penyakit');
    }

}
