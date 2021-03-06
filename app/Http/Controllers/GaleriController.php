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
        $this->authorize('admin');
        $data = Galeri::all();
        return view("galeri.index",compact('data'));
    }

    public function indexRoom()
    {
        $data = Galeri::where('jenis', '=', 'ruangan')->get();
        return view("galleryroom", compact('data'));
    }

    public function indexAct()
    {
        $data = Galeri::where('jenis', '=', 'kegiatan')->get();
        return view("galleryact", compact('data'));
    }

    public function indexFac()
    {
        $data = Galeri::where('jenis', '=', 'fasilitas')->get();
        return view("galleryfacility", compact('data'));
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
        try{
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
        catch(\PDOException $e){
            $msg ="Gagal mengubah foto. ";
            return redirect()->route('galeris.index')->with('error', $msg);
        }

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
        $this->authorize('admin');
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
        $this->authorize('admin');
        try{
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
        catch(\PDOException $e){
            $msg ="Gagal mengubah foto. ";
            return redirect()->route('galeris.index')->with('error', $msg);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        $this->authorize('admin');
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
