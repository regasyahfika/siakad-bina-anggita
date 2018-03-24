<?php

namespace App\Http\Controllers\WaliMurid;

use App\Http\Controllers\Controller;
use App\Model\Admin\Kelas;
use App\Model\Admin\MataPelajaran;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use App\Model\Admin\UlanganHarian;
use App\Model\User\Guru;
use Illuminate\Http\Request;
use PDF;
use Auth;

class UlanganController extends Controller
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
    public function index()
    {
        $tahun = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        return view('walimurid.ulangan.index', compact('tahun', 'tahunAkademik'));
    }

    //tampil detail ulangan harian
    public function tampil(TahunAkademik $tahun)
    {
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        $siswa =Auth::user()->siswa->id_siswa;
        $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahun->id_tahun)->where('siswa_id', $siswa)->orderBy('mapel_id', 'asc')->orderBy('tanggal', 'desc')->get();
        return view('walimurid.ulangan.show', compact('dataUlangan','tahun','siswa','tahunAkademik'));
    }

    public function exportPdf(TahunAkademik $tahun, Siswa $siswa)
    {
        $siswa =Auth::user()->siswa->id_siswa;
        $dataguru = Guru::where('jabatan', 'kepala sekolah')->first();
        $tahunaktif = TahunAkademik::where('status',1)->first();
        $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahunaktif->id_tahun)->where('siswa_id', $siswa)->get();
        $grup = $dataUlangan->groupBy('mapel_id');

        $hasil = [];
        foreach ($grup as $mapel => $data) {
            $uts = $data->where('tipe','UTS')->pluck('nilai')->first();
            $uas = $data->where('tipe','UAS')->pluck('nilai')->first();
            $rata = $data->pluck('nilai')->avg();
            $hasil[$mapel]['mapel'] = MataPelajaran::where('id_mapel', $mapel)->first();
            $hasil[$mapel]['nilai'] = $data->where('tipe','UH')->pluck('nilai');
            $hasil[$mapel]['uts'] = $uts;
            $hasil[$mapel]['uas'] = $uas;
            $hasil[$mapel]['rata-rata'] = $rata;
            $hasil[$mapel]['total'] = ($rata+$uts+(2*$uas))/4;
        }
        $pdf = PDF::setPaper('A4', 'landscape')->loadView('walimurid.Ulangan.pdf', compact('dataUlangan','tahunaktif','dataguru','hasil'));
        // return view('walimurid.ulanganHarian.pdf', compact('dataUlangan','tahunaktif','dataguru','hasil'));
        return $pdf->download('Ulangan.pdf');
    }

}
