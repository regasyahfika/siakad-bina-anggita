<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Model\Admin\Siswa;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
	  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:guru');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('guru.home');
    }

    public function hitung()
    {
        $siswa = Auth::user()->klsSiswa;
        $jumlah_siswa = $siswa->count();
        return view('guru.home', compact('siswa','jumlah_siswa'));  
    }
}
