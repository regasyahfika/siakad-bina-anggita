<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\MataPelajaran;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use App\Model\Admin\UlanganHarian;
use App\Model\User\Guru;
use Illuminate\Http\Request;
use PDF;

class LaporanAbsensiController extends Controller
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

    public function index()
    {
    	$tahun = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
    	return view('admin.laporanAbsensi.index',compact('tahun','tahunAkademik'));
    }

    public function tampil(TahunAkademik $tahun)
    {
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        $kelasSiswa = $tahun->pembagianKelas()->where('tahun_id', $tahunAkademik->id_tahun)->orderBy('ruang_id', 'asc')->get();
        // $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahun->id_tahun)->get();
        return view('admin.laporanAbsensi.show', compact('kelasSiswa','tahunAkademik','siswa','tahun'));
    }

    public function exportPdf(TahunAkademik $tahun, Siswa $siswa)
    {
        $dataguru = Guru::where('jabatan', 'kepala sekolah')->first();
        $tahunaktif = TahunAkademik::where('status',1)->first();
    	$dataAbsensi = $tahun->absensi()->where('tahun_id', $tahunaktif->id_tahun)->where('siswa_id', $siswa->id_siswa)->orderBy('siswa_id', 'desc')->orderBy('tanggal', 'desc')->get();

        $hadir = substr_count($dataAbsensi, 'Hadir');
        $sakit = substr_count($dataAbsensi, 'Sakit');
        $izin = substr_count($dataAbsensi, 'Izin');
        $alpa = substr_count($dataAbsensi, 'Alpa');

        $pdf = PDF::setPaper('A4', 'portrait')->loadView('admin.laporanAbsensi.pdf', compact('dataAbsensi','tahunaktif','dataguru','hadir','sakit','izin','alpa'));
        // return view('admin.laporanAbsensi.pdf', compact('dataAbsensi','tahunaktif','dataguru','hadir','sakit','izin','alpa'));
        return $pdf->download('absensi.pdf');
    }

    public function updateStatus(Request $request, $id)
    {
        if (TahunAkademik::findOrFail($id)) {
            TahunAkademik::where('status', 1)->update(['status' => 0]);

            $tahun = TahunAkademik::find($id);
            $tahun->status= 1;
            $tahun->save();
        }
        return redirect()->back();
    }

}
