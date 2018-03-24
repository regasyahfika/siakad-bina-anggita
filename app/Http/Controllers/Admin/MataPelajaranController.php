<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
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
        $mataPelajaran = MataPelajaran::all();
        return view('admin.mataPelajaran.index', compact('mataPelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mataPelajaran.create');
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
            'nama_mapel' => 'required|max:50',
            'keterangan' => 'required'
        ]);

        // MataPelajaran::create($request->all());

        $mataPelajaran = new MataPelajaran;
        $mataPelajaran->nama_mapel = $request->nama_mapel;
        $mataPelajaran->keterangan = $request->keterangan;
        $mataPelajaran->save();

        return redirect(route('matapelajaran.index'))->with('message','Tambah Data Berhasil');
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
        // $kate = mataPelajaran::where('id', $id)->first();
        $mataPelajaran = MataPelajaran::find($id);
        return view('admin.mataPelajaran.edit', compact('mataPelajaran'));
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
            'nama_mapel' => 'required|max:50|',
            'keterangan' => 'required'
        ]);

        $mataPelajaran = MataPelajaran::find($id);
        $mataPelajaran->nama_mapel = $request->nama_mapel;
        $mataPelajaran->keterangan = $request->keterangan;
        $mataPelajaran->save();

        return redirect(route('matapelajaran.index'))->with('message','Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MataPelajaran::where('id_mapel', $id)->delete();

        return redirect()->back()->with('message', 'Hapus Data Berhasil');
    }
}
