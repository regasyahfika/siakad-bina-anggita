<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Posting;
use App\Model\User\Kategori;
// use App\Model\User\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
    {
        $artikel = Kategori::find(1)->posts()->where('status',1)->orderBy('created_at','desc')->paginate(5);
    	$berita = Kategori::find(2)->posts()->where('status',1)->orderBy('created_at','desc')->paginate(5);
    	// $posting = Posting::where('status', 1)->orderBy('created_at','desc')->paginate(3);
    	// $kategori = Kategori::all();
    	return view('user.blog', compact('artikel','berita'));
    }
}
