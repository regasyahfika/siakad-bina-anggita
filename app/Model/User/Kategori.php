<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $fillable = ['nama'];

	protected $table = 'kategori';

	protected $primaryKey = 'id_kategori';

 //    public function posts()
	// {
	// 	return $this->belongsTo('App\Model\Admin\Posting','id_kategori');
	// }

	//setiap kategori memiliki banyak posting hasmany
	public function posts()
	{
		return $this->hasMany('App\Model\User\Posting','kategori_id', 'id_kategori');
	}

	public function getRouteKeyName()
	{
		return 'nama';
	}
}
