<?php

namespace App\Http\Controllers;

use App\Pengumpulan;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class PengumpulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try{
            $data = new Pengumpulan();
            $file=$request->file('file');
            $fileFolder='tugas';
            $tugasFile=time().'_'.$file->getClientOriginalName();
            $file->move($fileFolder,$tugasFile);
            $data->file=$tugasFile;

            $data->tugas_idtugas = $request->get('idtugas');
            $data->mahasiswa_idmahasiswa = $request->get('idmahasiswa');
            $data->tanggal = Carbon::now();
            $data->save();
            return back()->with('status','submit tugas baru berhasil dilakukan');      
        }
        catch(\PDOException $e){
            $msg ="Tugas sudah dikumpulkan. ";
            return back()->with('error', $msg);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumpulan $pengumpulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumpulan $pengumpulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumpulan $pengumpulan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumpulan $pengumpulan)
    {
        
    }
}
