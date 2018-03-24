<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Model\Admin\Kelas;
use App\Model\Admin\KelasSiswa;
use App\Model\Admin\MataPelajaran;
use App\Model\Admin\Siswa;
use App\Model\Admin\TahunAkademik;
use App\Model\Admin\UlanganHarian;
use App\Model\User\Guru;
use Auth;
use PDF;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class UlanganController extends Controller
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
        return view('guru.ulangan.index', compact('tahun', 'tahunAkademik'));
    }

    //tampil foto detail dari guru
    public function tampil(TahunAkademik $tahun)
    {
        $guru =Auth::user()->id_guru;
        $tahunAkademik = TahunAkademik::where('status', 1)->first();
        $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahunAkademik->id_tahun)->where('guru_id', $guru)->orderBy('kelas_id', 'asc')->orderBy('siswa_id', 'asc')->orderBy('tanggal', 'desc')->get();
        return view('guru.ulangan.show', compact('dataUlangan','tahun','guru','tahunAkademik'));
    }

    // public function exportPdf(TahunAkademik $tahun, Request $request)
    // {
    //     $guru =Auth::user()->id_guru;
    //     $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahun->id_tahun)->where('guru_id', $guru)->orderBy('kelas_id', 'asc')->orderBy('siswa_id', 'asc')->orderBy('tanggal', 'desc')->get();

    //     $dataguru = Guru::where('jabatan', 'kepala sekolah')->first();

    //     // $pdf = new Dompdf();
    //     // $pdf->loadView('guru.ulanganHarian.pdf',['data' =>$dataUlangan]);
    //     // $pdf->setPaper('A4', 'landscape');
    //     // $pdf->render();
    //     // $pdf->stream();

    //     $pdf = PDF::setPaper('A4', 'landscape')->loadView('guru.ulangan.pdf', compact('dataguru','guru','dataUlangan'));
    //     // $pdf->set_option('isHtml5ParserEnabled', true);
    //     // $pdf->setPaper('a4');
    //     // $pdf->setOrientation('landscape');
    //     // PDF::loadHTML('guru.ulanganHarian.pdf')->setPaper('a4')->save('ulangan.pdf');
    //     return $pdf->download('Ulangan Siswa.pdf');
    // }

    // public function exportExcel(TahunAkademik $tahun)
    // {
    //     $guru =Auth::user()->id_guru;
    //     $dataUlangan = $tahun->ulanganHarian()->where('tahun_id', $tahun->id_tahun)->where('guru_id', $guru)->orderBy('kelas_id', 'asc')->orderBy('siswa_id', 'asc')->orderBy('tanggal', 'desc')->get();

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
        $guru =Auth::user()->id_guru;
        $tahun = TahunAkademik::where('status', 1)->first();
        $siswa = Auth::user()->klsSiswa()->where('tahun_id', $tahun->id_tahun)->get();
        // $mapel = MataPelajaran::orderBy('keterangan', 'desc')->get();
        return view('guru.ulangan.create', compact('siswa','tahun','mapel','guru','user'));
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'siswa' => 'required',
            'mapel' => 'required',
            'kelas' => 'required',
            'tahun' => 'required',
            'guru' => 'required',
            'tipe' => 'required',
            'materi' => 'required',
            'nilai' => 'required',
            'tanggal' => 'required',
        ]);

        $ulangan = new UlanganHarian;
        $ulangan->siswa_id = $request->siswa;
        $ulangan->mapel_id = $request->mapel;
        $ulangan->kelas_id = $request->kelas;
        $ulangan->tahun_id = $request->tahun;
        $ulangan->guru_id = $request->guru;
        $ulangan->tipe = $request->tipe;
        $ulangan->materi = $request->materi;
        $ulangan->nilai = $request->nilai;
        $ulangan->tanggal = $request->tanggal;
        $ulangan->deskripsi = $request->deskripsi;

        $ulangan->save();

        return redirect(route('ulangan.tampil', $ulangan->tahun_id))->with('message', 'Tambah Data Berhasil');
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
        $guru =Auth::user()->id_guru;
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
        return view('guru.ulangan.edit', compact('guru','siswa','kelas','tahun','mapel','ulangan','listtipe'));
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
            // 'siswa' => 'required',
            'mapel' => 'required',
            // 'kelas' => 'required',
            // 'tahun' => 'required',
            // 'guru' => 'required',
            'materi' => 'required',
            'tipe' => 'required',
            'nilai' => 'required',
            'tanggal' => 'required',
        ]);

        $ulangan = UlanganHarian::find($id);
        // $ulangan->siswa_id = $request->siswa;
        $ulangan->mapel_id = $request->mapel;
        // $ulangan->kelas_id = $request->kelas;
        // $ulangan->tahun_id = $request->tahun;
        // $ulangan->guru_id = $request->guru;
        $ulangan->tipe = $request->tipe;
        $ulangan->materi = $request->materi;
        $ulangan->nilai = $request->nilai;
        $ulangan->tanggal = $request->tanggal;
        $ulangan->deskripsi = $request->deskripsi;

        $ulangan->save();

        return redirect(route('ulangan.tampil', $ulangan->tahun_id))->with('message', 'Berhasil Ubah Data');
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
