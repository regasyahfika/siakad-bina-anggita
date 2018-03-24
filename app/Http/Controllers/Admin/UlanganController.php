<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Kelas;
use App\Model\Admin\KelasSiswa;
use App\Model\Admin\KelasSiswaGuru;
use App\Model\Admin\MataPelajaran;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use App\Model\Admin\UlanganHarian;
use App\Model\User\Guru;
use Illuminate\Http\Request;

class UlanganController extends Controller
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
        return view('admin.ulangan.index', compact('tahun', 'tahunAkademik'));
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


    //tampil foto detail dari tahun
    public function tampil(TahunAkademik $tahun, Request $request)
    {
        if ($request->kelas_id) {
            // $dataUlangan = UlanganHarian::where('kelas_id', $request->kelas_id)->get();
            $tahunAkademik = TahunAkademik::where('status', 1)->first();
            $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahunAkademik->id_tahun)->where('kelas_id', $request->kelas_id)->orderBy('kelas_id', 'asc')->orderBy('siswa_id', 'asc')->orderBy('tanggal', 'desc')->get();
            $kelas = Kelas::all();
        } else {
            $tahunAkademik = TahunAkademik::where('status', 1)->first();
            $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahunAkademik->id_tahun)->orderBy('kelas_id', 'asc')->orderBy('siswa_id', 'asc')->orderBy('mapel_id', 'asc')->orderBy('tanggal', 'desc')->get();
            $kelas = Kelas::all();
        }

        return view('admin.ulangan.show', compact('dataUlangan','kelas','tahun','tahunAkademik',''));
    }

    // public function exportExcel(TahunAkademik $tahun, Request $request)
    // {
        
    //     $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahun->id_tahun)->orderBy('kelas_id', 'asc')->orderBy('siswa_id', 'asc')->orderBy('tanggal', 'desc')->get();

    //     $data = array( 
    //         array('No','Nama Siswa','Kelas','Nama Guru','Mata Pelajaran','Tahun Ajaran','Semester','Materi','Tanggal','Nilai','Deskripsi'));

    //     if (!empty($dataUlangan)) {
    //         $no =1;
    //         foreach ($dataUlangan as $itemData) {
    //             $data[] = [$no, $itemData->siswa['nama'], $itemData->kelas['nama_kelas'], $itemData->guru['nama'],$itemData->mapel['nama_mapel'],$itemData->tahunAkademik['tahun_ajaran'],$itemData->tahunAkademik['semester'],$itemData['materi'],date('d F Y', strtotime($itemData['tanggal'])),$itemData['nilai'],$itemData['deskripsi']];
    //             $no++;
    //         }
    //     }

    //     Excel::create('ulangan_harian', function($excel) use($data,$dataUlangan,$no) {

    //     $excel->sheet('ExportFile', function($sheet) use($data,$dataUlangan,$no) {

    //         $sheet->fromArray($data, null, 'A1', false,false);
    //         $sheet->row(1, function($row) {
    //             $row->setBackground('#e9e9e9'); 
    //             $row->setFontWeight('bold');             
    //         });

    //         $sheet->cells('A1:J'.$no, function($cells) {
    //             $cells->setAlignment('center');
    //             $cells->setFontFamily('Calibri');
    //             $cells->setFontSize(12);
    //         });

    //         $sheet->cells('A2:E'.$no, function($cells) {
    //             $cells->setAlignment('left');             
    //         });

    //         $sheet->cells('H2:K'.$no, function($cells) {
    //             $cells->setAlignment('left');             
    //         });

    //         $sheet->setBorder('A1:K'.$no);
    //         $sheet->setAutoSize(true);
    //     });

    //     })->export('xls');

    //     // return view('admin.ulanganHarian.index',compact('data'));
    // }

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
        // $mapel = MataPelajaran::orderBy('keterangan', 'desc')->get();
        return view('admin.ulangan.create', compact('siswa','tahun','mapel','guru'));
    }

    public function tipejson(Request $request)
    {
        $itemTipe = UlanganHarian::where('tahun_id', $request->tahun_id)->where('siswa_id', $request->siswa_id)->where('mapel_id', $request->mapel_id)->pluck('tipe')->toArray();
        return response()->json($itemTipe);
    }

    public function pelajaranjson(Request $request)
    {
        $kelas = Kelas::where('id_kelas', $request->id_kelas)->first();
        switch ($kelas->tipe) {
            case 'TK':
                $mapellist = MataPelajaran::where('keterangan', 'TK')->orWhere('keterangan', 'Semua Siswa')->get(); 
                break;
            case 'SD':
            case 'SMP':
            case 'SMA':
                $mapellist = MataPelajaran::where('keterangan', 'SD, SMP, SMA')->orWhere('keterangan', 'Semua Siswa')->get(); 
                break;
        }

        return response()->json($mapellist);
    }

    public function kelasjson(Request $request)
    {
        $tahun = TahunAkademik::where('status', 1)->first();
        $itemKelas = KelasSiswa::where('siswa_id', $request->siswa_id)->where('tahun_id', $tahun->id_tahun)->pluck('kelas_id');
        $kelas = Kelas::select(['id_kelas','nama_kelas'])->where('id_kelas', $itemKelas[0])->first();
        return response()->json($kelas);
    }

    public function gurujson(Request $request)
    {
        $tahun = TahunAkademik::where('status', 1)->first();
        $itemGuru = KelasSiswa::with('guruKelas')->where('siswa_id', $request->siswa_id)->where('tahun_id', $tahun->id_tahun)->get();
        return response()->json($itemGuru[0]);   
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
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'tahun_id' => 'required',
            'guru_id' => 'required',
            'tipe' => 'required',
            'materi' => 'required',
            'nilai' => 'required',
            'tanggal' => 'required',
        ]);

        $ulangan = new UlanganHarian;
        $ulangan->siswa_id = $request->siswa_id;
        $ulangan->mapel_id = $request->mapel_id;
        $ulangan->kelas_id = $request->kelas_id;
        $ulangan->tahun_id = $request->tahun_id;
        $ulangan->guru_id = $request->guru_id;
        $ulangan->tipe = $request->tipe;
        $ulangan->materi = $request->materi;
        $ulangan->nilai = $request->nilai;
        $ulangan->tanggal = $request->tanggal;
        $ulangan->deskripsi = $request->deskripsi;

        $ulangan->save();

        return redirect(route('ulangansiswa.tampil', $ulangan->tahun_id))->with('message', 'Tambah Data Berhasil');
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
        $guru = Guru::where('jabatan', 'like', '%'. 'guru' . '%')->get();
        $tahun = TahunAkademik::where('status', 1)->first();
        $siswa = Siswa::all();
        // $kelas = Kelas::all();
        $ulangan = UlanganHarian::find($id);
        $itemTipe = UlanganHarian::where('tahun_id', $ulangan->tahun_id)->where('siswa_id', $ulangan->siswa_id)->where('mapel_id', $ulangan->mapel_id)->distinct('tipe')->pluck('tipe')->toArray();
        $listtipe = ['UH'];
        if (!in_array('UTS', $itemTipe)) {
            array_push($listtipe, 'UTS');
        }
        if (!in_array('UAS', $itemTipe)) {
            array_push($listtipe, 'UAS');
        }
        array_push($listtipe, $ulangan->tipe);
        $listtipe = array_unique($listtipe);
        $kelas = Kelas::where('id_kelas', $ulangan->kelas_id)->first();
        switch ($kelas->tipe) {
            case 'TK':
                $mapel = MataPelajaran::where('keterangan', 'TK')->orWhere('keterangan', 'Semua Siswa')->get(); 
                break;
            case 'SD':
            case 'SMP':
            case 'SMA':
                $mapel = MataPelajaran::where('keterangan', 'SD, SMP, SMA')->orWhere('keterangan', 'Semua Siswa')->get(); 
                break;
        }
        return view('admin.ulangan.edit', compact('guru','siswa','kelas','tahun','mapel','ulangan','listtipe'));
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
            // 'siswa_id' => 'required',
            'mapel_id' => 'required',
            // 'kelas_id' => 'required',
            // 'tahun_id' => 'required',
            // 'guru_id' => 'required',
            'materi' => 'required',
            'tipe' => 'required',
            'nilai' => 'required',
            'tanggal' => 'required',
        ]);

        $ulangan = UlanganHarian::find($id);
        // $ulangan->siswa_id = $request->siswa_id;
        $ulangan->mapel_id = $request->mapel_id;
        // $ulangan->kelas_id = $request->kelas_id;
        // $ulangan->tahun_id = $request->tahun_id;
        // $ulangan->guru_id = $request->guru_id;
        $ulangan->tipe = $request->tipe;
        $ulangan->materi = $request->materi;
        $ulangan->nilai = $request->nilai;
        $ulangan->tanggal = $request->tanggal;
        $ulangan->deskripsi = $request->deskripsi;

        $ulangan->save();

        return redirect(route('ulangansiswa.tampil', $ulangan->tahun_id))->with('message', 'Berhasil Ubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = UlanganHarian::find($id);
        $del->delete();

        return redirect()->back()->with('message','Hapus Data Berhasil');
    }
}
