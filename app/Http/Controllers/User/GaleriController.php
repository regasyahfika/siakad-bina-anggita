<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Album;
use App\Model\User\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
    	$album = Album::with('galeri')->orderBy('created_at', 'desc')->get();
    	return view('user.galeri', compact('album'));
    }


}
