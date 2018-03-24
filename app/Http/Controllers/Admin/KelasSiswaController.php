<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Kelas;
use App\Model\Admin\KelasSiswa;
use App\Model\Admin\KelasSiswaGuru;
use App\Model\Admin\ProgramKelas;
use App\Model\Admin\Ruang;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use App\Model\User\Guru;
use Illuminate\Http\Request;
use PDF;

class KelasSiswaController extends Controller
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
    public function index(Request $request)
    {
        $tahun = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        // if ($request->tahun_id) {
        //     $kelasSiswa = KelasSiswa::where('tahun_id', $request->tahun_id)->get();
        //     $klsSiswaGuru = KelasSiswaGuru::all();
        //     $tahun = TahunAkademik::all();
        // } else {
        //     $kelasSiswa = KelasSiswa::all();
        //     $klsSiswaGuru = KelasSiswaGuru::all();
        //     $tahun = TahunAkademik::all();
            
        // }
        return view('admin.kelasSiswa.index', compact('tahun','tahunAkademik'));
    }

    //tampil detail dari tahun
    public function tampil(TahunAkademik $tahun, Request $request)
    {
        if ($request->ruang_id) {
            $tahunAkademik = TahunAkademik::where('status', 1)->first();
            $kelasSiswa = $tahun->pembagianKelas()->where('tahun_id', $tahunAkademik->id_tahun)->where('ruang_id', $request->ruang_id)->orderBy('ruang_id', 'asc')->orderBy('program_id', 'asc')->get();
            $ruang = Ruang::all();
        } else {
            $tahunAkademik = TahunAkademik::where('status', 1)->first();
            $kelasSiswa = $tahun->pembagianKelas()->where('tahun_id', $tahunAkademik->id_tahun)->orderBy('program_id', 'asc')->orderBy('ruang_id', 'asc')->get();
            $ruang = Ruang::all();
        }

        return view('admin.kelasSiswa.show', compact('kelasSiswa','tahun','tahunAkademik','ruang'));
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

    public function exportPdf(TahunAkademik $tahun, Request $request)
    {
        // $kelasSiswa = $tahun->pembagianKelas()->where('tahun_id', $tahun->id_tahun)->orderBy('kelas_id', 'asc')->get();

        $pagi = $tahun->pembagiankelas()->where('tahun_id', $tahun->id_tahun)->where('program_id', 1)->orderBy('ruang_id', 'asc')->get();
        $siang = $tahun->pembagiankelas()->where('tahun_id', $tahun->id_tahun)->where('program_id', 2)->orderBy('ruang_id', 'asc')->get();
        $sore = $tahun->pembagiankelas()->where('tahun_id', $tahun->id_tahun)->where('program_id', 3)->orderBy('ruang_id', 'asc')->get();

        $dataguru = Guru::where('jabatan', 'kepala sekolah')->first();

        $klsSiswaGuru = KelasSiswaGuru::all();
        $pdf = PDF::loadView('admin.kelasSiswa.pdf', compact('pagi','siang','sore','klsSiswaGuru','dataguru'));
        return $pdf->download('Pembagian Kelas.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $ruang = Ruang::all();
        $kelas = Kelas::all();
        $program = ProgramKelas::all();
        $tahun = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        $guru = Guru::where('jabatan', 'like', '%'. 'guru' . '%')->get();
        return view('admin.kelasSiswa.create', compact('siswa','ruang','kelas','program','tahun','guru'));
    }

    public function siswajson(Request $request)
    {
        $itemSiswa = KelasSiswa::where('tahun_id', $request->tahun_id)->pluck('siswa_id');
        $siswa = Siswa::select(['id_siswa','nama'])->whereNotIn('id_siswa', $itemSiswa)->get();
        return response()->json($siswa);
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
            'program_id' => 'required',
            'tahun_id' => 'required',
        ]);

        // $klsSiswa = Siswa::find($request->siswa_id);
        // $klsSiswa->kelasSiswa()->attach($request->kelas_id,$request->only(
        //     'ruang_id','program_id','tahun_id','keterangan'
        // ));

        $klsSiswa = new KelasSiswa;
        $klsSiswa->siswa_id = $request->siswa_id;
        $klsSiswa->ruang_id = $request->ruang_id;
        $klsSiswa->kelas_id = $request->kelas_id;
        $klsSiswa->program_id = $request->program_id;
        $klsSiswa->tahun_id = $request->tahun_id;
        $klsSiswa->keterangan = $request->keterangan;

        $klsSiswa->save();

        $klsSiswa->guruKelas()->sync($request->guru);

        return redirect(route('pembagiankelas.tampil', $klsSiswa->tahun_id))->with('message', 'Tambah Data Berhasil');
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
        $klsSiswa = kelasSiswa::find($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $ruang = Ruang::all();
        $program = ProgramKelas::all();
        $tahun = TahunAkademik::all();
        $guru = Guru::where('jabatan', 'like', '%'. 'guru' . '%')->get();
        return view('admin.kelasSiswa.edit', compact('klsSiswa', 'siswa', 'kelas', 'ruang', 'program', 'tahun', 'guru'));
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
            'ruang_id' => 'required',
            'kelas_id' => 'required',
            'program_id' => 'required',
        ]);

        $klsSiswa = KelasSiswa::find($id);
        // $klsSiswa->siswa_id = $request->siswa_id;
        // $klsSiswa->tahun_id = $request->tahun_id;
        $klsSiswa->ruang_id = $request->ruang_id;
        $klsSiswa->kelas_id = $request->kelas_id;
        $klsSiswa->program_id = $request->program_id;
        $klsSiswa->keterangan = $request->keterangan;

        $klsSiswa->save();

        $klsSiswa->guruKelas()->sync($request->guru);

        return redirect(route('pembagiankelas.tampil', $klsSiswa->tahun_id))->with('message', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = kelasSiswa::find($id);
        $del->delete();

        return redirect()->back()->with('message','Hapus Data Berhasil');
    }
}
