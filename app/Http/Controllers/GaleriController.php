<?php

namespace App\Http\Controllers;

use App\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Galeri::paginate(10);
        return view("galeri.index",compact('data'));
    }

    public function indexRoom()
    {
        return view("galleryroom");
    }

    public function indexAct()
    {
        return view("galleryact");
    }

    public function indexFac()
    {
        return view("galleryfacility");
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
        $data = new Galeri();
        $data->jenis = $request->get('jenis');

        $file=$request->file('foto');
        $imgFolder='assets/undana/galeri/';
        $imgFile=time().'_'.$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->file=$imgFile;

        $data->save();
        return redirect()->route('galeris.index')->with('status','galeri baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        $data = $galeri;
        return view("galeri.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        $galeri->jenis=$request->get('jenis');
        if($request->hasFile('foto')){
            $dest='assets/undana/galeri/'.$galeri->file;
            if(file_exists($dest)){
                @unlink($dest); 
            }
            $file=$request->file('foto');
            $imgFolder='assets/undana/galeri/';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $galeri->file=$imgFile;
        }
        $galeri->save();
        return redirect()->route('galeris.index')->with('status','foto berhasil diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        try{
            $galeri->delete();
            return redirect()->route('galeris.index')->with('status','foto galeri berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus foto. ";
            return redirect()->route('galeris.index')->with('error', $msg);
        }
    }
}
