<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Absensi;
use App\Model\Admin\Kelas;
use App\Model\Admin\KelasSiswa;
use App\Model\Admin\ProgramKelas;
use App\Model\Admin\Ruang;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use App\Model\User\Guru;
use Illuminate\Http\Request;
use PDF;

class AbsensiController extends controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        return view('admin.absensi.index', compact('tahun', 'tahunAkademik'));
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

    //tampil detail dari tahun
    public function tampil(TahunAkademik $tahun, Request $request)
    {
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        $dataAbsensi = $tahun->absensi()->where('tahun_id', $tahunAkademik->id_tahun)->orderBy('siswa_id', 'desc')->orderBy('tanggal', 'desc')->get();
        return view('admin.absensi.tampil', compact('dataAbsensi','tahun','tahunAkademik'));
    }

    public function exportPdf(TahunAkademik $tahun)
    {
        $dataguru = Guru::where('jabatan', 'kepala sekolah')->first();
        $tahunaktif = TahunAkademik::where('status',1)->first();
        $dataAbsensi = $tahun->absensi()->where('tahun_id', $tahunaktif->id_tahun)->orderBy('kelas_id', 'asc')->get();

        $grup = $dataAbsensi->groupBy('siswa_id');

        $hasil = [];
        foreach ($grup as $siswa => $data) {
            $hasil[$siswa]['siswa'] = Siswa::where('id_siswa', $siswa)->first();
            $hasil[$siswa]['kelas'] = Kelas::where('id_kelas', $siswa)->first();
            $hasil[$siswa]['hadir'] = substr_count($data, 'Hadir');
            $hasil[$siswa]['sakit'] = substr_count($data, 'Sakit');
            $hasil[$siswa]['izin'] = substr_count($data, 'Izin');
            $hasil[$siswa]['alpa'] = substr_count($data, 'Alpa');
        }

        // dd($hasil);

        $pdf = PDF::setPaper('A4', 'portrait')->loadView('admin.absensi.pdf', compact('grup','dataAbsensi','tahunaktif','dataguru','hadir','sakit','izin','alpa','hasil'));
        // return view('admin.absensi.pdf', compact('grup','dataAbsensi','tahunaktif','dataguru','hadir','sakit','izin','alpa','hasil'));
        return $pdf->download('Absensi.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahun = TahunAkademik::where('status', 1)->first();
        $siswa = KelasSiswa::where('tahun_id', $tahun->id_tahun)->get();
        $guru = Guru::where('jabatan', 'like', '%'. 'guru' . '%')->get();
        return view('admin.absensi.create', compact('ruang','siswa','kelas','tahun','program','guru'));
    }

    public function kelasjson(Request $request)
    {
        $tahun = TahunAkademik::where('status', 1)->first();
        $itemKelas = KelasSiswa::where('siswa_id', $request->siswa_id)->where('tahun_id', $tahun->id_tahun)->pluck('kelas_id');
        $kelas = Kelas::select(['id_kelas','nama_kelas'])->where('id_kelas', $itemKelas[0])->first();
        return response()->json($kelas);
    }

    public function ruangjson(Request $request)
    {
        $tahun = TahunAkademik::where('status', 1)->first();
        $itemRuang = KelasSiswa::where('siswa_id', $request->siswa_id)->where('tahun_id', $tahun->id_tahun)->pluck('ruang_id');
        $ruang = Ruang::select(['id_ruang','nama_ruang'])->where('id_ruang', $itemRuang[0])->first();
        return response()->json($ruang);
    }

    public function programjson(Request $request)
    {
        $tahun = TahunAkademik::where('status', 1)->first();
        $itemProgram = KelasSiswa::where('siswa_id', $request->siswa_id)->where('tahun_id', $tahun->id_tahun)->pluck('program_id');
        $program = ProgramKelas::select(['id_program','nama_program'])->where('id_program', $itemProgram[0])->first();
        return response()->json($program);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'siswa_id' => 'required',
            'ruang_id' => 'required',
            'kelas_id' => 'required',
            'tahun_id' => 'required',
            'program_id' => 'required',
            'guru_id' => 'required',
            'tanggal' => 'required',
            'data_absensi' => 'required',
        ]);

        $absensi = new Absensi;
        $absensi->siswa_id = $request->siswa_id;
        $absensi->ruang_id = $request->ruang_id;
        $absensi->kelas_id = $request->kelas_id;
        $absensi->tahun_id = $request->tahun_id;
        $absensi->program_id = $request->program_id;
        $absensi->guru_id = $request->guru_id;
        $absensi->tanggal = $request->tanggal;
        $absensi->data_absensi = $request->data_absensi;
        $absensi->keterangan = $request->keterangan;

        $absensi->save();

        return redirect(route('absensi.tampil', $absensi->tahun_id))->with('message', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang = Ruang::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $tahun = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        $program = ProgramKelas::all();
        $absensi = Absensi::find($id);
        return view('admin.absensi.edit', compact('absensi','siswa','kelas','tahun','ruang','program','guru'));
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
        $this->validate($request,[
            'siswa_id' => 'required',
            'ruang_id' => 'required',
            'kelas_id' => 'required',
            'tahun_id' => 'required',
            'program_id' => 'required',
            'guru_id' => 'required',
            'tanggal' => 'required',
            'data_absensi' => 'required',
        ]);

        $absensi = Absensi::find($id);
        $absensi->siswa_id = $request->siswa_id;
        $absensi->ruang_id = $request->ruang_id;
        $absensi->kelas_id = $request->kelas_id;
        $absensi->tahun_id = $request->tahun_id;
        $absensi->program_id = $request->program_id;
        $absensi->guru_id = $request->guru_id;
        $absensi->tanggal = $request->tanggal;
        $absensi->data_absensi = $request->data_absensi;
        $absensi->keterangan = $request->keterangan;

        $absensi->save();

        return redirect(route('absensi.tampil', $absensi->tahun_id))->with('message', 'Berhasil Ubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absensi::where('id_absen', $id)->delete();

        return redirect()->back()->with('message','Hapus Data Berhasil');
    }
}
