<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Model\Admin\MataPelajaran;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use App\Model\Admin\UlanganHarian;
use App\Model\User\Guru;
use Illuminate\Http\Request;
use Auth;
use PDF;

class LaporanUlanganController extends Controller
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
    	return view('guru.laporanUlangan.index',compact('tahun','tahunAkademik'));
    }

     public function tampil(TahunAkademik $tahun)
    {
        // $user = Auth::user()->klsSiswa;
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        $kelasSiswa = $tahun->pembagianKelas()->where('tahun_id', $tahun->id_tahun)->whereHas('guruKelas', function($query){
            $query->where('guru_id', Auth::user()->id_guru);
        })->orderBy('ruang_id', 'asc')->get();

        // untuk membuat query where dari tabel yang berelasi

        // $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahun->id_tahun)->get();
        return view('guru.laporanUlangan.show', compact('kelasSiswa','tahunAkademik','siswa','tahun'));
    }

    public function exportPdf(TahunAkademik $tahun, Siswa $siswa)
    {
        $dataguru = Guru::where('jabatan', 'kepala sekolah')->first();
        // $tahunaktif = TahunAkademik::where('status',1)->first();
    	$dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahun->id_tahun)->where('siswa_id', $siswa->id_siswa)->get();
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
        $pdf = PDF::setPaper('A4', 'landscape')->loadView('guru.laporanUlangan.pdf', compact('dataUlangan','tahunaktif','dataguru','hasil'));
        // return view('admin.laporan.pdf', compact('dataUlangan','tahunaktif','dataguru','hasil'));
        return $pdf->download('Ulangan Siswa.pdf');
    }

}
