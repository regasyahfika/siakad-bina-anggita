<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class KelasSiswaGuru extends Model
{
    protected $table = 'kelas_siswa_guru';

    protected $primaryKey = ['klsiswa_id', 'guru_id'];

}
