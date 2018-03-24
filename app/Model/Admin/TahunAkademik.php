<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahun_akademik';

    protected $primaryKey = 'id_tahun';

    protected $fillable = ['tahun_ajaran','semester', 'status',];

    // public function absensi()
    // {
    // 	return $this->hasMany('App\Model\Admin\Absensi', 'tahun_id', 'id_tahun');
    // }

    public function ulanganHarian()
    {
        return $this->hasMany('App\Model\Admin\UlanganHarian', 'tahun_id', 'id_tahun');
    }

    public function pembagianKelas()
    {
        return $this->hasMany('App\Model\Admin\KelasSiswa', 'tahun_id', 'id_tahun');
    }

    public function absensi()
    {
        return $this->hasMany('App\Model\Admin\Absensi', 'tahun_id', 'id_tahun');
    }
}
