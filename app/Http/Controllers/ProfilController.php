<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $data = Profil::all();
        return view("profil.index",compact('data'));
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
        $data = new Profil();
        $data->sambutan = $request->get('sambutan');
        $data->visi = $request->get('visi');
        $data->misi = $request->get('misi');
        $data->tujuan = $request->get('tujuan');
        $data->tentang = $request->get('tentang');
        $data->alamat = $request->get('alamat');
        $data->email = $request->get('email');
        $data->telepon = $request->get('telepon');
        
        if($request->hasFile('foto')){
            $file=$request->file('foto');
            $imgFolder='images';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $data->foto_kaprodi=$imgFile;
        }

        $data->save();
        return redirect()->route('profil.index')->with('status','profil telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        $this->authorize('admin');
        $data = $profil;
        return view("profil.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        $this->authorize('admin');
        $profil->sambutan=$request->get('sambutan');
        $profil->visi=$request->get('visi');
        $profil->misi=$request->get('misi');
        $profil->tentang=$request->get('tentang');
        $profil->alamat=$request->get('alamat');
        $profil->email = $request->get('email');
        $profil->telepon = $request->get('telepon');

        if($request->hasFile('foto')){
            $dest='images/'.$profil->foto;
            if(file_exists($dest)){
                @unlink($dest); 
            }
            $file=$request->file('foto');
            $imgFolder='images';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $profil->foto_kaprodi=$imgFile;
        }
        $profil->save();
        return redirect()->route('profils.index')->with('status','data profil penjaskesrek berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }

    public function frontEndVisi(){
        $data = Profil::all();
        return view("visimisi",compact('data'));
    }

    public function frontEndSambutan(){
        $data = Profil::all();
        return view("sambutan",compact('data'));
    }
}
