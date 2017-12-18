<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{

	public function tags()
	{
		return $this->belongsToMany('App\Model\User\Tag','post_tags')->withTimestamps();
	}

	public function kategori()
	{
		return $this->belongsToMany('App\Model\User\Kategori','kategori_posts')->withTimestamps();
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function getImageUrlAttribute()
	{
		return asset('storage/gambar/'. $this->image);
	}
}