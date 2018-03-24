<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $primaryKey = 'id_absen';

    protected $fillable = ['siswa_id','guru_id','kelas_id','ruang_id','tahun_id','program_id','hari','data_absensi','tanggal','keterangan'];

    public function program()
    {
        return $this->belongsTo('App\Model\Admin\ProgramKelas', 'program_id', 'id_program');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Model\Admin\Kelas', 'kelas_id', 'id_kelas');
    }

    public function ruang()
    {
        return $this->belongsTo('App\Model\Admin\Ruang', 'ruang_id', 'id_ruang');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Model\Admin\Siswa', 'siswa_id', 'id_siswa');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo('App\Model\Admin\TahunAkademik', 'tahun_id', 'id_tahun');
    }

    public function guru()
    {
        return $this->belongsTo('App\Model\User\Guru', 'guru_id', 'id_guru');
    }

    public function getRouteKeyName()
	{
		return 'id_absen';
	}
}
