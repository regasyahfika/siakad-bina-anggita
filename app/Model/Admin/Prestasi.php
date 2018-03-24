<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $primaryKey = 'id_prestasi';

    protected $fillable = ['nama_lomba', 'nama_peraih', 'peringkat', 'tahun', 'tingkat',];
}
