<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProgramKelas extends Model
{
	protected $fillable = ['nama_program'];

	protected $table = 'program_kelas';

	protected $primaryKey = 'id_program';

	//setiap kategori memiliki banyak posting hasmany

}
