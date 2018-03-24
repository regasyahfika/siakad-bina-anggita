<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
	protected $fillable = ['nama_mapel'];

	protected $table = 'mata_pelajaran';

	protected $primaryKey = 'id_mapel';

	// public function programSiswa()
	// {
	// 	return $this->hasMany('App\Model\Admin\Siswa','program_id', 'id_program');
	// }

}
