<?php

namespace App\Http\Controllers;

use App\Materi;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materi.create');
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
            $data = new Materi();
            $now = Carbon::now();
            $file=$request->file('file');
            $fileFolder='materi';
            $materiFile=time().'_'.$file->getClientOriginalName();
            $file->move($fileFolder,$materiFile);
            $data->file=$materiFile;

            $data->pertemuans_idpertemuan = $request->get('idpertemuan');
            $data->judul = $request->get('judul');
            $data->save();
            return back()->with('status','materi baru berhasil ditambahkan');    
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
            return back()->with('error', $msg);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        try{
            $materi->delete();
            return back()->with('status','materi berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return back()->with('error', $msg);
        }
    }
}
