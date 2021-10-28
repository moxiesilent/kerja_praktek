<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;
use Illuminate\Facade\File;
use DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dosen::all();
        // $jbt = Jabatan::all();
        // return view("dosen.index",compact('data','jbt'));
        return view("dosen.index",compact('data'));
    }

    public function profilDosen()
    {
        $data = Dosen::all();
        return view("profildosen",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Dosen();
        
        $file=$request->file('foto');
        $imgFolder='images';
        $imgFile=time().'_'.$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->foto=$imgFile;

        $data->nip = $request->get('nip');
        $data->nama = $request->get('nama');
        $data->email = $request->get('email');
        $data->tanggallahir = $request->get('tanggallahir');
        $data->jabatan = $request->get('jabatan');
        $data->bidangkeahlian = $request->get('bidang');
        $data->save();
        return redirect()->route('dosens.index')->with('status','dosen baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        $data = $dosen;
        return view("Dosen.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $dosen->nama=$request->get('nama');
        $dosen->email=$request->get('email');
        $dosen->tanggallahir=$request->get('tanggallahir');
        $dosen->jabatan=$request->get('jabatan');
        $dosen->bidangkeahlian=$request->get('bidang');
        if($request->hasFile('foto')){
            $dest='images/'.$dosen->foto;
            if(file_exists($dest)){
                @unlink($dest); 
            }
            $file=$request->file('foto');
            $imgFolder='images';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $dosen->foto=$imgFile;
        }
        $dosen->save();
        return redirect()->route('dosens.index')->with('status','data dosen berhasil diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        try{
            $dosen->delete();
            return redirect()->route('dosens.index')->with('status','data dosen berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('dosens.index')->with('error', $msg);
        }
    }

    public function getEditForm(Request $request){
        $nip = $request->get("nip");
        $data = Dosen::find($nip);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('dosen.getEditForm',compact('data'))->render()
        ),200);
    }
}
