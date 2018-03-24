<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakurikuler';

    protected $primaryKey = 'id_ekskul';

    protected $fillable = ['nama_ekskul','keterangan','gambar','guru_id'];

    public function guruEkskul()
    {
    	return $this->belongsTo('App\Model\User\Guru', 'guru_id', 'id_guru');
    }

    public function getGambarUrlAttribute()
	{
		return asset('storage/ekskul/'. $this->gambar);
	}
}
