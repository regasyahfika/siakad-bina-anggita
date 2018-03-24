<?php

namespace App\Http\Controllers\WaliMurid;

use App\Http\Controllers\Controller;
use App\Model\Admin\WaliMurid;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:walimurid');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profils = WaliMurid::all();
        return view('walimurid.profil.index', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profils = WaliMurid::find($id);
        return view('walimurid.profil.edit', compact('profils'));
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
            // 'nip' => 'required|unique:guru',
            'nama' => 'required',
            'email' => 'required',
            // 'password' => 'required|string|min:6',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'notelp' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);

        // Guru::create($request->all());

        $guru = Guru::find($id);
        // $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->email = $request->email;
        // $guru->password = bcrypt($request->password);
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->notelp = $request->notelp;
        $guru->agama = $request->agama;
        $guru->pendidikan = $request->pendidikan;
        $guru->jabatan = $request->jabatan;
        $guru->alamat = $request->alamat;

        $guru->save();

        if ($request->hasFile('foto')) {
            // $imageName = $request->image->store('public/gambar');
            $file = $request->file('foto');
            $fileName = 'guru'.'-'.$guru->$id.'.'. $file->getClientOriginalExtension();
            $guru->foto = $fileName;
            $file->storeAs('public/guru', $fileName);
        }
        $guru->save();

        return redirect(route('profil.index'))->with('message', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
