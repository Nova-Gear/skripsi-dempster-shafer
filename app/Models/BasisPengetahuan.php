<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasisPengetahuan extends Model
{
    // protected $table = 'tabel_basis_pengetahuan';
    // protected $primaryKey = 'id_basis_pengetahuan';

    // protected $fillable = [
    //     'kode_penyakit',
    //     'nama_gejala',
    // ];

    protected $table = 'basis_pengetahuan';

    protected $fillable = [
        'kode_penyakit',
        'kode_gejala',
        'densitas'
    ];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala', 'kode_gejala');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit', 'kode_penyakit');
    }
}
