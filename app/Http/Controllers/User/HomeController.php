<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Posting;
use App\Model\User\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
    {
        // $artikel = Kategori::find(1)->posts()->where('status',1)->orderBy('created_at','desc')->paginate(5);
    	// $artikel = Posting::where('kategori_id', 1)->where('status', 1)->orderBy('created_at','desc')->paginate(5);
    	$itemArtikel = Kategori::where('nama', 'like', '%'. 'artikel' .'%')->first();
    	$artikel = Posting::where('kategori_id', $itemArtikel->id_kategori)->where('status', 1)->orderBy('created_at','desc')->paginate(5);
    	$itemBerita = Kategori::where('nama', 'like', '%'. 'berita' .'%')->first();
    	$berita = Posting::where('kategori_id', $itemBerita->id_kategori)->where('status', 1)->orderBy('created_at','desc')->paginate(5);

    	return view('user.blog', compact('artikel', 'berita','itemArtikel','itemBerita'));
    }
}
