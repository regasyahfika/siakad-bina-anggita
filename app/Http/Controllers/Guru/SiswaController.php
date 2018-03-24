<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Model\Admin\KelasSiswa;
use App\Model\Admin\KelasSiswaGuru;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use Auth;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:guru');
        // $this->middleware('auth:admin,guru');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //annomimus function
        // $siswa = Siswa::where(function ($query) use ($request) {
        //     if ($request->agama) {
        //         $query->where('agama', $request->agama);
        //     }
        // })->get();
        $user = Auth::user()->klsSiswa;
        $tahunAkademik = TahunAkademik::where('status', 1)->get();
        return view('guru.siswa.index', compact('user','tahunAkademik'));
    }

    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('guru.siswa.show', compact('siswa'));
    }

}
