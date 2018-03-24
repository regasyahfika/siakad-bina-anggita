<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $primaryKey = 'id_galeri';

    protected $fillable = ['judul', 'album_id', 'keterangan', 'gambar'];

    public function album()
    {
    	return $this->belongsTo('App\Model\User\Album', 'album_id', 'id_album');
    }

    public function getGambarUrlAttribute()
	{
		return asset('storage/galeri/'. $this->gambar);
	}
}
