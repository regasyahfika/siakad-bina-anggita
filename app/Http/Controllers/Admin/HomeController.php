<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\User\Posting;
use App\Model\User\User;
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

        $user = User::all();
        $post = Posting::all();
        $jumlah_user = $user->count();
        $jumlah_post = $post->count();
    	return view('admin.home', compact('user','jumlah_user','jumlah_post','post'));
    }
}
