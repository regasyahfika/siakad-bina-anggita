<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';

    protected $primaryKey = 'id_album';

    protected $fillable = ['nama_album'];

    public function galeri()
    {
    	return $this->hasMany('App\Model\User\Galeri', 'album_id', 'id_album');
    }

    public function getRouteKeyName()
	{
		return 'id_album';
	}
}
