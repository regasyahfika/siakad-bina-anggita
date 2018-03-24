<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
	protected $table = 'posting';

	protected $fillable = ['judul', 'slug', 'konten', 'status', 'image', 'kategori_id'];

	protected $primaryKey = 'id_posting';


	public function kategori()
	{
		return $this->belongsTo('App\Model\User\Kategori','kategori_id', 'id_kategori');
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function getImageUrlAttribute()
	{
		return asset('storage/blog/'. $this->image);
	}
}
