<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    protected $table = 'kelas_siswa';

    protected $primaryKey = 'id_klsiswa';

    public function siswa()
    {
    	return $this->belongsTo('App\Model\Admin\Siswa','siswa_id','id_siswa');
    }

	public function kelas()
    {
    	return $this->belongsTo('App\Model\Admin\Kelas','kelas_id','id_kelas');
    }

    public function ruang()
    {
    	return $this->belongsTo('App\Model\Admin\Ruang','ruang_id','id_ruang');
    }

    public function program()
    {
    	return $this->belongsTo('App\Model\Admin\ProgramKelas','program_id','id_program');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo('App\Model\Admin\TahunAkademik','tahun_id','id_tahun');
    }

    public function guruKelas()
	{
		return $this->belongsToMany('App\Model\User\Guru','kelas_siswa_guru','klsiswa_id','guru_id')->withTimestamps();
	}
}
