<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
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
        $guru = Guru::all();
        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.create');
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
            'nip' => 'required|numeric|unique:guru',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
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

        $guru = new Guru;
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->email = $request->email;
        $guru->password = bcrypt($request->password);
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
            $fileName = 'guru'.'-'.$guru->id_guru.'.'. $file->getClientOriginalExtension();
            $guru->foto = $fileName;
            $file->storeAs('public/guru', $fileName);
        }
        $guru->save();

        return redirect(route('guru.index'))->with('message', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.edit', compact('guru'));
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
            // 'nip' => 'required|numeric|digits:18',
            'nama' => 'required',
            'email' => 'required|email',
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

        return redirect(route('guru.index'))->with('message', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Guru::where('id_guru', $id)->delete();
        $del = Guru::find($id);
        if (!empty($del->foto)) {
            Storage::delete('public/guru/'. $del->foto); 
            $del->delete();
        }else{
            $del->delete();
        }

        return redirect()->back()->with('message', 'Berhasil Menghapus Data');

        return redirect()->back();
    }
}
