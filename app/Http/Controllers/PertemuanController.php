<?php

namespace App\Http\Controllers;

use App\Pertemuan;
use Illuminate\Http\Request;

class PertemuanController extends Controller
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
        $this->authorize('dosen');
        try{
            $data = new Pertemuan();
            $data->mengajars_idmengajars = $request->get('idmengajar');
            $data->tanggal = $request->get('tanggal');
            $data->topik = $request->get('topik');
            $data->save();
            return back();
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah pertemuan. ";
            return back()->with('error', $msg);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertemuan $pertemuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertemuan $pertemuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertemuan $pertemuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertemuan $pertemuan)
    {
        $this->authorize('dosen');
        try{
            $pertemuan->delete();
            return back()->with('status','data pertemuan berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data. ";
            return back()->with('error', $msg);
        }
    }
}
