<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Kategori;
use App\Model\User\Posting;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
    	$berita = Posting::where('kategori_id', 2)->where('status', 1)->orderBy('created_at','desc')->paginate(5);
    	$kategori = Kategori::all();
    	return view('user.berita', compact('berita','kategori'));
    }
}
