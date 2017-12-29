<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Kategori;
use App\Model\User\Posting;
use App\Model\User\Tag;
use Illuminate\Http\Request;

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
        
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $kategori = Kategori::all();
        return view('admin.post.post', compact('tags','kategori'));
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
            // 'subjudul' => 'required',
            'slug' => 'required',
            'konten' => 'required',
        ]);

        // if ($request->hasFile('image')) {
        //     $imageName = $request->image->store('public/gambar');
            
        // }


        $post = new Posting;
        $post->judul = $request->judul;
        // $post->image = $imageName;
        // $post->subjudul = $request->subjudul;
        $post->slug = str_slug($request->slug);
        $post->status = $request->status;
        $post->konten = $request->konten;

        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $request->file('image')->storeAs('public/gambar', $fileName);
        $post->image = $fileName;

        $post->save();
        $post->tags()->sync($request->tag);
        $post->kategori()->sync($request->kategori);

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
        $post = Posting::with('tags','kategori')->where('id', $id)->first();
        $tags = Tag::all();
        $kategori = Kategori::all();
        return view('admin.post.view', compact('post','tags','kategori'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posting::with('tags','kategori')->where('id', $id)->first();
        $tags = Tag::all();
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
        ]);



        $post = Posting::find($id);
        // $post->image = $imageName;
        $post->judul = $request->judul;
        $post->slug = str_slug($request->slug);
        $post->status = $request->status;
        $post->konten = $request->konten;

        if ($request->hasFile('image')) {
            // $imageName = $request->image->store('public/gambar');
            $file = $request->file('image');
            $fileName = 'blog'.'-'.$id.'.'. $file->getClientOriginalExtension();
            $post->image = $fileName;
            $file->storeAs('public/gambar', $fileName);
        }

        // $file = $request->file('image');
        // $fileName = $file->getClientOriginalName();
        // $request->file('image')->storeAs('public/gambar', $fileName);
        // $post->image = $fileName;
        
        $post->tags()->sync($request->tag);
        $post->kategori()->sync($request->kategori);
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
        Posting::where('id', $id)->delete();

        return redirect()->back();
    }
}
