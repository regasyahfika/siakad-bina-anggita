<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Ekstrakurikuler;
use App\Model\Admin\Prestasi;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
    	$ekskul = Ekstrakurikuler::all();
    	$prestasi = Prestasi::all();
    	return view('user.kegiatan', compact('ekskul','prestasi'));
    }
}
