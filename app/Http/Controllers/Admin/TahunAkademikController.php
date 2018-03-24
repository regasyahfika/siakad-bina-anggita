<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\TahunAkademik;
use Illuminate\Http\Request;

class TahunAkademikController extends Controller
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
        $thn = TahunAkademik::orderBy('tahun_ajaran', 'desc')->get();
        return view('admin.tahunAkademik.index', compact('thn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tahunAkademik.create');

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
            'tahun_ajaran' => 'required',
            'tahun_awal' => 'required',
            'tahun_akhir' => 'required',
            'semester' => 'required',
        ]);

        $tahun = new TahunAkademik;
        $tahun->tahun_ajaran = $request->tahun_ajaran;
        $tahun->tahun_awal = $request->tahun_awal;
        $tahun->tahun_akhir = $request->tahun_akhir;
        $tahun->semester = $request->semester;
        $tahun->save();

        return redirect(route('tahunakademik.index'))->with('message', 'Tambah Data Berhasil');
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
        $thn = TahunAkademik::find($id);
        return view('admin.tahunAkademik.edit', compact('thn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        // $thn = TahunAkademik::findOrFail($id); 
        if (TahunAkademik::findOrFail($id)) {
            // $thn->update(['status' => 1]);
            TahunAkademik::where('status', 1)->update(['status' => 0]);


            $tahun = TahunAkademik::find($id);
            // $tahun->update(['status' => 0]);
            $tahun->status= 1;
            $tahun->save();
            // $tahun = TahunAkademik::where('id_tahun', $id)->update(['status' => 1]);

        }
        // $ruang = Ruang::find($id);
        // $ruang->update($request->all());

        return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tahun_ajaran' => 'required',
            'tahun_awal' => 'required',
            'tahun_akhir' => 'required',
            'semester' => 'required',
        ]);

        $thn = TahunAkademik::find($id);
        $thn->tahun_ajaran = $request->tahun_ajaran;
        $thn->tahun_awal = $request->tahun_awal;
        $thn->tahun_akhir = $request->tahun_akhir;
        $thn->semester = $request->semester;
        $thn->status = $request->status;

        $thn->save();

        return redirect(route('tahunakademik.index'))->with('message', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = TahunAkademik::find($id);
        $del->delete();

        return redirect()->back()->with('message', 'Hapus Data Berhasil');
    }
}
