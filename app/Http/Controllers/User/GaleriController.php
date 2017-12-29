<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Posting;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
    	$gm = Posting::all();
    	return view('user.galeri', compact('gm'));
    }


}
