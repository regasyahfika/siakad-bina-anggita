<?php

namespace App\Http\Controllers\WaliMurid;

use App\Http\Controllers\Controller;
use App\Model\Admin\TahunAkademik;
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
        $this->middleware('auth:walimurid');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
    	return view('walimurid.home', compact('tahunAkademik'));
    }
}
