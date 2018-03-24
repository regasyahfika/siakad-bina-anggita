<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Siswa;
use App\Model\Admin\WaliMurid;
use Illuminate\Http\Request;

class WaliMuridController extends Controller
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
        $walimurid = WaliMurid::all();
        return view('admin.walimurid.index', compact('walimurid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('admin.walimurid.create', compact('siswa'));
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
            'nama' => 'required',
            'username' => 'required|min:6|unique:wali_murid',
            'password' => 'required|string|min:6',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required|max:13',
            'alamat' => 'required',
            'siswa_id' => 'required',
        ]);

        $walimurid = new WaliMurid;
        $walimurid->nama = $request->nama;
        $walimurid->username = $request->username;
        $walimurid->password = bcrypt($request->password);
        $walimurid->agama = $request->agama;
        $walimurid->pekerjaan = $request->pekerjaan;
        $walimurid->telp = $request->telp;
        $walimurid->alamat = $request->alamat;
        $walimurid->siswa_id = $request->siswa_id;

        $walimurid->save();

        // $walimurid->siswa()->sync($request->siswa_id);

        // $walimurid = WaliMurid::create($request->all());

        return redirect(route('walimurid.index'))->with('message', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $walimurid = WaliMurid::find($id);
        return view('admin.walimurid.show', compact('walimurid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $walimurid = WaliMurid::find($id);
        return view('admin.walimurid.edit', compact('walimurid'));
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
            'nama' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required|max:13',
            'alamat' => 'required',
        ]);

        $walimurid = WaliMurid::find($id);
        $walimurid->update($request->all());

        return redirect(route('walimurid.index'))->with('message', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = WaliMurid::find($id);
        $del->delete();

        return redirect()->back();
    }
}
