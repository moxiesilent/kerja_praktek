<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $data = Artikel::paginate(5);
        return view('artikel.index', compact("data"));
    }

    public function artikelkeindex()
    {
        $data = Artikel::orderBy('idartikels', 'desc')->take(3)->get();
        $dosen = DB::table('dosens')->get();
        return view("index",compact('data', 'dosen'));
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
        $this->authorize('admin');
        $data = new Artikel();
        $data->judul = $request->get('judul');
        $data->isi = $request->get('isi');
        $data->tanggal = Carbon::now();
        if($request->hasFile('gambar')){
            $file=$request->file('gambar');
            $imgFolder='assets/undana/artikel/';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $data->gambar=$imgFile;
        }

        $data->save();
        return back()->with('status','artikel baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */

     
    public function show(Artikel $artikel)
    {
        return view("artikeldetail",compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        $this->authorize('admin');
        $data = $artikel;
        return view("artikel.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $this->authorize('admin');
        $artikel->judul=$request->get('judul');
        $artikel->isi=$request->get('isi');
        $artikel->tanggal=Carbon::now();

        if($request->hasFile('gambar')){
            $dest='assets/undana/artikel/'.$artikel->gambar;
            if(file_exists($dest)){
                @unlink($dest); 
            }
            $file=$request->file('gambar');
            $imgFolder='assets/undana/artikel/';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $artikel->gambar=$imgFile;
        }
        $artikel->save();
        return redirect()->route('artikels.index')->with('status','data artikel berhasil diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $this->authorize('admin');
        try{
            $artikel->delete();
            return back()->with('status','data artikel berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return back()->with('error', $msg);
        }
    }

    // public function backEndIndex(){
    //     $data = Artikel::paginate(5);
    //     return view('artikel.index', compact("data"));
    // }

    public function frontEndIndex()
    {
        $data = Artikel::paginate(15);
        return view("artikel",compact('data'));
    }

    public function frontEndShow(Artikel $artikel)
    {
        return view("artikeldetail",compact('artikel'));
    }
}
