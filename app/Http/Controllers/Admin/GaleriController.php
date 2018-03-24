<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Album;
use App\Model\User\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
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
        $gallerys = Galeri::all();
        return view('admin.galeri.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();
        return view('admin.galeri.create', compact('albums'));
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
            'judul' => 'required',
            'album_id' => 'required',
            'keterangan' => 'required',
        ]);

        $gallerys = new Galeri;
        $gallerys->judul = $request->judul; 
        $gallerys->album_id = $request->album_id; 
        $gallerys->keterangan = $request->keterangan;

        $gallerys->save();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = 'galeri'.'-'.$gallerys->id_galeri.'.'. $file->getClientOriginalExtension();
            $gallerys->gambar = $fileName;
            $file->storeAs('public/galeri', $fileName);
        }

        $gallerys->save();

        return redirect(route('album.tampil', $gallerys->album_id))->with('messsage','Tambah Data Berhasil');

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
        $gallerys = Galeri::find($id);
        $albums = Album::all();
        return view('admin.galeri.edit', compact('gallerys','albums'));
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
            'judul' => 'required',
            'keterangan' => 'required',
            'album_id' => 'required',
        ]);

        $gallerys = Galeri::find($id);
        $gallerys->judul = $request->judul;
        $gallerys->keterangan = $request->keterangan;
        $gallerys->album_id = $request->album_id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = 'galeri'.'-'.$id.'.'. $file->getClientOriginalExtension();
            $gallerys->gambar = $fileName;
            $file->storeAs('public/galeri', $fileName);
        }

        $gallerys->save();

        return redirect(route('album.tampil', $gallerys->album_id))->with('message', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Galeri::find($id);
        if (!empty($del->gambar)) {
            Storage::delete('public/galeri/'. $del->gambar); 
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
