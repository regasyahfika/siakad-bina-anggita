<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa';

    protected $fillable = ['nis', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'foto', 'agama',];

    protected $hidden = ['password', 'remember_token'];

    public function walimurid()
    {
    	return $this->hasMany('App\Model\Admin\WaliMurid', 'siswa_id', 'id_siswa');
    }

    // public function absensi()
    // {
    //     return $this->hasMany('App\Model\Admin\Absensi', 'siswa_id', 'id_siswa');
    // }

    // public function programKelas()
    // {
    //     return $this->belongsTo('App\Model\Admin\ProgramKelas', 'program_id', 'id_program');
    // }

    // public function kelasSiswa()
    // {
    //     return $this->belongsToMany('App\Model\Admin\Kelas', 'kelas_siswa', 'siswa_id', 'kelas_id')->withPivot('keterangan')->withTimestamps();
    // }

    public function getFotoUrlAttribute()
	{
		return asset('storage/siswa/'. $this->foto);
	}

    // public function guruKelas()
    // {
    //     return $this->belongsToMany('App\Model\User\Guru','kelas_siswa_guru', 'klsiswa_id', 'guru_id')->withTimestamps();
    // }


}
