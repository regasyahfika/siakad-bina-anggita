<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('auth:admin,guru');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //annomimus function
        // $siswa = Siswa::where(function ($query) use ($request) {
        //     if ($request->agama) {
        //         $query->where('agama', $request->agama);
        //     }
        // })->get();

        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create');
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
            'nis' => 'required|numeric|digits:10|unique:siswa',
            'nama' => 'required',
            // 'password' => 'required|string|min:6',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = new Siswa;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;

        $siswa->save();

        if ($request->hasFile('foto')) {
            // $imageName = $request->image->store('public/gambar');
            $file = $request->file('foto');
            $fileName = 'siswa'.'-'.$siswa->id_siswa.'.'. $file->getClientOriginalExtension();
            $siswa->foto = $fileName;
            $file->storeAs('public/siswa', $fileName);
        }
        $siswa->save();

        return redirect(route('siswa.index'))->with('message', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa.edit', compact('siswa'));
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
            // 'nip' => 'required|numeric|digits:10',
            'nama' => 'required',
            // 'password' => 'required|string|min:6',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);


        $siswa = Siswa::find($id);
        // $siswa->nip = $request->nip;
        $siswa->nama = $request->nama;
        // $siswa->password = bcrypt($request->password);
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;

        $siswa->save();

        if ($request->hasFile('foto')) {
            // $imageName = $request->image->store('public/gambar');
            $file = $request->file('foto');
            $fileName = 'siswa'.'-'.$siswa->$id.'.'. $file->getClientOriginalExtension();
            $siswa->foto = $fileName;
            $file->storeAs('public/siswa', $fileName);
        }
        $siswa->save();

        return redirect(route('siswa.index'))->with('message', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Siswa::find($id);
        if (!empty($del->foto)) {
            Storage::delete('public/siswa/'. $del->foto); 
            $del->delete();
        }else{
            $del->delete();
        }

        return redirect()->back()->with('message', 'Berhasil Menghapus Data');
    }
}
