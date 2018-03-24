<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
    	$guru = Guru::all();
    	return view('user.guru', compact('guru'));
    }
}
