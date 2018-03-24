<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Ekstrakurikuler;
use App\Model\User\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
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
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('admin.ekskul.index', compact('ekstrakurikuler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::where('jabatan', 'like', '%'. 'guru' . '%')->get();
        return view('admin.ekskul.create', compact('guru'));
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
            'nama_ekskul' => 'required',
            'guru_id' => 'required',
            'keterangan' => 'required',
        ]);

        $ekstrakurikuler = new Ekstrakurikuler;
        $ekstrakurikuler->nama_ekskul = $request->nama_ekskul; 
        $ekstrakurikuler->guru_id = $request->guru_id; 
        $ekstrakurikuler->keterangan = $request->keterangan;

        $ekstrakurikuler->save();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = 'ekskul'.'-'.$ekstrakurikuler->id_ekskul.'.'. $file->getClientOriginalExtension();
            $ekstrakurikuler->gambar = $fileName;
            $file->storeAs('public/ekskul', $fileName);
        }

        $ekstrakurikuler->save();

        return redirect(route('ekskul.index'))->with('messsage','Tambah Data Berhasil');

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
        $ekstrakurikuler = Ekstrakurikuler::find($id);
        $guru = Guru::where('jabatan', 'like', '%'. 'guru' . '%')->get();
        return view('admin.ekskul.edit', compact('ekstrakurikuler','guru'));
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
            'nama_ekskul' => 'required',
            'keterangan' => 'required',
            'guru_id' => 'required',
        ]);

        $ekstrakurikuler = Ekstrakurikuler::find($id);
        $ekstrakurikuler->nama_ekskul = $request->nama_ekskul;
        $ekstrakurikuler->keterangan = $request->keterangan;
        $ekstrakurikuler->guru_id = $request->guru_id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = 'ekskul'.'-'.$id.'.'. $file->getClientOriginalExtension();
            $ekstrakurikuler->gambar = $fileName;
            $file->storeAs('public/ekskul', $fileName);
        }

        $ekstrakurikuler->save();

        return redirect(route('ekskul.index'))->with('message', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Ekstrakurikuler::find($id);
        if (!empty($del->gambar)) {
            Storage::delete('public/ekskul/'. $del->gambar); 
            $del->delete();
        }else{
            $del->delete();
        }

        return redirect()->back()->with('message', 'Berhasil Menghapus Data');

        // $del = Galeri::where('id_galeri', $id)->first();
        // Storage::delete('public/galeri/'.$del->gambar);
        // $del->delete();
    }
}
