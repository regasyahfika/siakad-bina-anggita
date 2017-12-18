<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Kategori;
use App\Model\User\Posting;
use App\Model\User\Tag;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
	// public function index()
 //    {
 //    	$posts = Posting::where('status',1)->orderBy('created_at','desc')->paginate(4);
 //    	// $posting = Posting::where('status', 1)->orderBy('created_at','desc')->paginate(3);
 //    	return view('user.kategori', compact('posts'));
 //    }

    public function index()
    {
        $artikel = Kategori::find(1)->posts()->where('status',1)->orderBy('created_at','desc')->paginate(4);
        $berita = Kategori::find(2)->posts()->where('status',1)->orderBy('created_at','desc')->paginate(4);
        // $posting = Posting::where('status', 1)->orderBy('created_at','desc')->paginate(3);
        // $kategori = Kategori::all();
        return view('user.blog', compact('artikel','berita'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts();
        return view('user.kategori',compact('posts'));
    }

    public function kategori(Kategori $kategori)
    {
        $posts = $kategori->posts()->where('status',1)->orderBy('created_at','desc')->paginate(4);
        $kategori = Kategori::all();
        return view('user.kategori',compact('posts','kategori'));
    }
}
