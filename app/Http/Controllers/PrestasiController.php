<?php

namespace App\Http\Controllers;

use App\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Facade\File;
use DB;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Prestasi::paginate(10);
        return view("prestasi.index",compact('data'));
    }

    public function prestasikewebprofile()
    {
        $data = Prestasi::all();
        return view("prestasimahasiswa",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prestasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Prestasi();
        $data->namakegiatan = $request->get('kegiatan');
        $data->tingkat = $request->get('tingkat');
        $data->prestasi = $request->get('prestasi');
        $data->tahun = $request->get('tahun');

        $file=$request->file('foto');
        $imgFolder='assets/undana/prestasi/';
        $imgFile=time().'_'.$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->foto=$imgFile;

        $data->save();
        return redirect()->route('prestasis.index')->with('status','prestasi telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestasi $prestasi)
    {
        $data = $prestasi;
        return view("Prestasi.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $prestasi->namakegiatan=$request->get('kegiatan');
        $prestasi->tingkat=$request->get('tingkat');
        $prestasi->prestasi=$request->get('prestasi');
        $prestasi->tahun=$request->get('tahun');

        if($request->hasFile('foto')){
            $dest='assets/undana/prestasi/'.$prestasi->foto;
            if(file_exists($dest)){
                @unlink($dest); 
            }
            $file=$request->file('foto');
            $imgFolder='assets/undana/prestasi/';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $prestasi->foto=$imgFile;
        }
    
        $prestasi->save();
        return redirect()->route('prestasis.index')->with('status','prestasi berhasil diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        try{
            $prestasi->delete();
            return redirect()->route('prestasis.index')->with('status','data prestasi berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('prestasis.index')->with('error', $msg);
        }
    }

    public function getEditForm(Request $request){
        $idprestasi = $request->get("idprestasi");
        $data = Prestasi::find($idprestasi);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('prestasi.getEditForm',compact('data'))->render()
        ),200);
    }
}
