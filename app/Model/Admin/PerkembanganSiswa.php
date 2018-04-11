<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PerkembanganSiswa extends Model
{
    protected $table = 'ulangan';

    protected $primaryKey = 'id_ulangan';

    protected $fillable = ['siswa_id','kelas_id','guru_id','tahun_id','mapel_id','semester','tanggal','materi','nilai','deskripsi'];

    public function guru()
    {
        return $this->belongsTo('App\Model\User\Guru', 'guru_id', 'id_guru');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Model\Admin\Kelas', 'kelas_id', 'id_kelas');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Model\Admin\MataPelajaran', 'mapel_id', 'id_mapel');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Model\Admin\Siswa', 'siswa_id', 'id_siswa');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo('App\Model\Admin\TahunAkademik', 'tahun_id', 'id_tahun');
    }

    public function getRouteKeyName()
	{
		return 'id_ulangan';
	}
}
