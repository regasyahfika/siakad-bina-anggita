<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Model\Admin\Absensi;
use App\Model\Admin\Kelas;
use App\Model\Admin\ProgramKelas;
use App\Model\Admin\Ruang;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use Illuminate\Http\Request;
use Auth;

class AbsensiController extends controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        return view('guru.absensi.index', compact('tahun', 'tahunAkademik'));
    }

    //tampil detail dari tahun
    public function tampil(TahunAkademik $tahun, Request $request)
    {  
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        $guru =Auth::user()->id_guru;
        $dataAbsensi = $tahun->absensi()->where('tahun_id', $tahunAkademik->id_tahun)->where('guru_id', $guru)->orderBy('siswa_id', 'desc')->orderBy('tanggal', 'desc')->get();
        return view('guru.absensi.show', compact('dataAbsensi','tahun','guru','tahunAkademik'));
    }

}
