<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    // protected $table = 'table_penyakit';
    // protected $primaryKey = 'id_penyakit';

    protected $table = 'penyakit';
    protected $fillable = ['kode_penyakit', 'penyakit', 'solusi', 'deskripsi'];


    public function hasilDiagnosa()
    {
        return $this->hasMany(HasilDiagnosa::class, 'kode_penyakit', 'kode_penyakit');
    }

    public function basisPengetahuan()
{
    return $this->hasMany(BasisPengetahuan::class, 'kode_penyakit');
}

}
