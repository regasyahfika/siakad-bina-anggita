<?php

namespace App\Http\Controllers\WaliMurid;

use App\Http\Controllers\Controller;
use App\Model\Admin\TahunAkademik;
use App\Model\Admin\UlanganHarian;
use App\Model\Admin\MataPelajaran;
use Illuminate\Http\Request;
use Auth;

class PerkembanganSiswaController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // cari siswa yang wali murid login sekarang
        $siswa =Auth::user()->siswa->id_siswa;
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        $perkembangan = UlanganHarian::where('tahun_id', $tahunAkademik->id_tahun)->where('siswa_id', $siswa)->get();
        // $dataTanggal = $perkembangan->pluck('tanggal');
        $group = $perkembangan->groupBy('mapel_id');
        $dataTanggal = $perkembangan->where('tipe', 'UH')->groupBy('tanggal')->keys();

        $warna = collect(['#0000FF','#8A2BE2','#A52A2A','#DEB887','#5F9EA0','#7FFF00','#D2691E','#FF7F50','#6495ED','#B8860B','#8B0000','#FF00FF','#800080','#BC8F8F','#FFFF00','#9ACD32','#EE82EE','#008080','#FA8072','#000000']);
        $hasil = [];

        foreach ($group as $mapel => $data) {
            $hasil[$mapel]['tanggal'] = $data->pluck('tanggal');
            $hasil[$mapel]['nilai'] = $data->where('tipe','UH')->pluck('nilai');
            $hasil[$mapel]['warna'] = $warna->random();
            $hasil[$mapel]['nama_mapel'] = MataPelajaran::where('id_mapel', $mapel)->first()->nama_mapel;

        }

        return view('walimurid.perkembangan.index',compact('perkembangan','tahunAkademik','siswa','dataNilai', 'dataTanggal','group','hasil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
