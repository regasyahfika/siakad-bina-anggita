<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\ProgramKelas;
use Illuminate\Http\Request;

class ProgramKelasController extends Controller
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
        $programKelas = ProgramKelas::all();
        return view('admin.programKelas.index', compact('programKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.programKelas.create');
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
            'nama_program' => 'required|max:50|unique:program_kelas',
        ]);

        ProgramKelas::create($request->all());

        // $programKelas = new ProgramKelas;
        // $programKelas->nama = $request->nama;
        // $programKelas->save();

        return redirect(route('programkelas.index'))->with('message','Tambah Data Berhasil');
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
        // $kate = programKelas::where('id', $id)->first();
        $programKelas = ProgramKelas::find($id);
        return view('admin.programKelas.edit', compact('programKelas'));
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
            'nama_program' => 'required',
            // 'slug' => 'required',
        ]);

        $programKelas = ProgramKelas::find($id);
        $programKelas->update($request->all());

        // $programKelas = programKelas::find($id);
        // $programKelas->nama = $request->nama;
        // $programKelas->slug = str_slug($request->slug);
        // $programKelas->save();

        return redirect(route('programkelas.index'))->with('message','Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        programKelas::where('id_program', $id)->delete();

        return redirect()->back()->with('message', 'Hapus Data Berhasil');
    }
}
