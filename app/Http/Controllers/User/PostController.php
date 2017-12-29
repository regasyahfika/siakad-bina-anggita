<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Kategori;
use App\Model\User\Posting;
use App\Model\User\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Posting $post)
    {
    	// $posting = Posting::where('status', 1)->orderBy('created_at','desc')->get();
    	$kategori = Kategori::all();
    	$jml = $kategori->find(1)->posts()->where('status',1)->count();
    	$tags = Tag::all();
    	return view('user.post', compact('post','kategori', 'tags', 'jml'));
    }


}
