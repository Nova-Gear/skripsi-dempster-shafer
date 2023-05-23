<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    // protected $table = 'tabel_gejala';
    // protected $primaryKey = 'id_gejala';

    protected $table = 'gejala';

    protected $fillable = [
        'kode_gejala',
        'gejala',
    ];
}
