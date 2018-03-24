<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Kategori;
use App\Model\User\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Input;

class PostController extends Controller
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
        $posts = Posting::all();
        
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.post.create', compact('tags','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *\
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'slug' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required',
        ]);


        $post = new Posting;
        $post->judul = $request->judul;
        // $post->image = $imageName;
        $post->slug = str_slug($request->slug);
        $post->status = $request->status;
        $post->konten = $request->konten;
        $post->kategori_id = $request->kategori_id;
        // $post->kategori_id = Input::get('kategori_id');
        $post->save();    
        // $file = $request->file('image');
        // $fileName = $file->getClientOriginalName();
        // $request->file('image')->storeAs('public/gambar', $fileName);
        // $post->image = $fileName;

        if ($request->hasFile('image')) {
            // $imageName = $request->image->store('public/gambar');
            $file = $request->file('image');
            $fileName = 'blog'.'-'.$post->id_posting.'.'. $file->getClientOriginalExtension();
            $post->image = $fileName;
            $file->storeAs('public/blog', $fileName);
        }

        $post->save();


        return redirect(route('post.index'))->with('message','Tambah Data Berhasil');
    }

    /**

     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posting::find($id);
        $kategori = Kategori::all();
        return view('admin.post.show', compact('post','tags','kategori'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $post = Posting::with('tags','kategori')->where('id_posting', $id)->first();
        $post = Posting::find($id);
        $kategori = Kategori::all();
        return view('admin.post.edit', compact('post','tags','kategori'));
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
            'slug' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required',
        ]);



        $post = Posting::find($id);
        // $post->image = $imageName;
        $post->judul = $request->judul;
        $post->slug = str_slug($request->slug);
        $post->status = $request->status;
        $post->konten = $request->konten;
        $post->kategori_id = $request->kategori_id;

        if ($request->hasFile('image')) {
            // $imageName = $request->image->store('public/gambar');
            $file = $request->file('image');
            $fileName = 'blog'.'-'.$id.'.'. $file->getClientOriginalExtension();
            $post->image = $fileName;
            $file->storeAs('public/blog', $fileName);
        }

        // $file = $request->file('image');
        // $fileName = $file->getClientOriginalName();
        // $request->file('image')->storeAs('public/gambar', $fileName);
        // $post->image = $fileName;
        
        // $post->tags()->attach($request->input('tag'));
        // $post->kategori()->sync($request->kategori);
        $post->save();

        return redirect(route('post.index'))->with('message','Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $del = Posting::find($id);
        // $del->delete();

        $del = Posting::find($id);
        if (!empty($del->image)) {
            Storage::delete('public/blog/'. $del->image); 
            $del->delete();
        }else{
            $del->delete();
        }

        return redirect()->back()->with('message', 'Berhasil Menghapus Data');
    }
}
