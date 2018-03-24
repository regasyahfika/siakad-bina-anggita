<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Model\Admin\MataPelajaran;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use App\Model\Admin\UlanganHarian;
use App\Model\User\Guru;
use Illuminate\Http\Request;
use PDF;
use Auth;

class LaporanAbsensiController extends Controller
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

    public function index()
    {
    	$tahun = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
    	return view('guru.laporanAbsensi.index',compact('tahun','tahunAkademik'));
    }

    public function tampil(TahunAkademik $tahun)
    {
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        $kelasSiswa = $tahun->pembagianKelas()->where('tahun_id', $tahun->id_tahun)->whereHas('guruKelas', function($query){
            $query->where('guru_id', Auth::user()->id_guru);
        })->orderBy('ruang_id', 'asc')->get();

        return view('guru.laporanAbsensi.show', compact('kelasSiswa','tahunAkademik','siswa','tahun'));
    }

    public function exportPdf(TahunAkademik $tahun, Siswa $siswa)
    {
        $dataguru = Guru::where('jabatan', 'kepala sekolah')->first();
        // $tahunaktif = TahunAkademik::where('status',1)->first();
    	$dataAbsensi = $tahun->absensi()->where('tahun_id', $tahun->id_tahun)->where('siswa_id', $siswa->id_siswa)->orderBy('siswa_id', 'desc')->orderBy('tanggal', 'desc')->get();

        $hadir = substr_count($dataAbsensi, 'Hadir');
        $sakit = substr_count($dataAbsensi, 'Sakit');
        $izin = substr_count($dataAbsensi, 'Izin');
        $alpa = substr_count($dataAbsensi, 'Alpa');

        $pdf = PDF::setPaper('A4', 'portrait')->loadView('guru.laporanAbsensi.pdf', compact('dataAbsensi','tahunaktif','dataguru','hadir','sakit','izin','alpa'));
        // return view('guru.laporanAbsensi.pdf', compact('dataAbsensi','tahunaktif','dataguru','hadir','sakit','izin','alpa'));
        return $pdf->download('absensi.pdf');
    }

}
