<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'tag';

	protected $fillable = ['nama'];

	protected $primaryKey = 'id_tag';

    public function posts()
    {
    	return $this->belongsToMany('App\Model\User\Posting','post_tag', 'tag_id', 'posting_id');
    }

    public function getRouteKeyName()
	{
		return 'nama';
	}
}
