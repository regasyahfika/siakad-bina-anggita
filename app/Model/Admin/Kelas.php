<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $primaryKey = 'id_kelas';

    protected $fillable = ['nama_kelas','tipe'];

    public function siswaKelas()
    {
        return $this->belongsToMany('App\Model\Admin\Siswa', 'kelas_siswa', 'kelas_id', 'siswa_id');
    }

    // public function absensi()
    // {
    // 	return $this->hasMany('App\Model\Admin\Absensi', 'kelas_id', 'id_kelas');
    // }

    
}
