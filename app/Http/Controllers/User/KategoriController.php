<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Kategori;
use App\Model\User\Posting;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function kategori(Kategori $kategori)
    {
        $posts = $kategori->posts()->where('status',1)->orderBy('created_at','desc')->paginate(2);
        $kategori = Kategori::all();
        return view('user.kategori',compact('posts','kategori'));
    }
}
