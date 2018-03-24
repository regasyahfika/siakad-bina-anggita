<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = 'post_tag';

    protected $primaryKey = ['posting_id', 'tag_id'];
}
