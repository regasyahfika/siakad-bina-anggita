<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Absensi;
use App\Model\Admin\Admin;
use App\Model\Admin\Siswa;
use App\Model\User\Guru;
use App\Model\User\Posting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('admin.home');
    }

    public function hitung()
    {
        $siswa = Siswa::all();
        $post = Posting::all();
        $guru = Guru::all();
        $absensi = Absensi::all();
        $jumlah_siswa = $siswa->count();
        $jumlah_post = $post->count();
        $jumlah_guru = $guru->count();
        $jumlah_absen = $absensi->count();
        return view('admin.home', compact('siswa','jumlah_siswa','jumlah_post','post','guru', 'jumlah_guru','absensi','jumlah_absen'));  
    }
}
