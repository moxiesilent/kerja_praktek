<?php

namespace App\Http\Controllers;

use App\Penelitian;
use Illuminate\Http\Request;
use DB;
use App\Imports\PenelitianImport;
use Maatwebsite\Excel\Facades\Excel;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $data = Penelitian::all();

        return view("penelitian.index",compact('data'));
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
            $data = new Penelitian();
            $data->judul = $request->get('judul');
            $data->sumber = $request->get('sumber');
            $data->jumlah_dana = $request->get('dana');
            $data->tahun = $request->get('tahun');
            $data->tipe = $request->get('tipe');
            $data->save();
            return back()->with('status','penelitian baru telah ditambahkan');
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
            return back()->with('error', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penelitian  $penelitian
     * @return \Illuminate\Http\Response
     */
    public function show(Penelitian $penelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penelitian  $penelitian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penelitian $penelitian)
    {
        $this->authorize('admin');
        $data = $penelitian;
        return view("penelitian.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penelitian  $penelitian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penelitian $penelitian)
    {
        $this->authorize('admin');
        try{
            $penelitian->judul = $request->get('judul');
            $penelitian->sumber = $request->get('sumber');
            $penelitian->jumlah_dana = $request->get('dana');
            $penelitian->tahun = $request->get('tahun');
            $penelitian->tipe = $request->get('tipe');
            $penelitian->save();
            return redirect()->route('penelitians.index')->with('status','data penelitian berhasil diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data.";
            return redirect()->route('penelitians.index')->with('error', $msg);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penelitian  $penelitian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penelitian $penelitian)
    {
        $this->authorize('admin');
        try{
            $penelitian->delete();
            return redirect()->route('penelitians.index')->with('status','data penelitian berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('penelitians.index')->with('error', $msg);
        }
    }

    public function frontEndIndex()
    {
        $data = Penelitian::all();
        return view("penelitian",compact('data'));
    }

    public function import(Request $request)
    {
        $this->authorize('admin');
        try{
            Excel::import(new PenelitianImport, request()->file('file'));
            return back()->with('status', 'Berhasil import');
        }
        catch(\PDOException $e){
            $msg ="Gagal mengimport data, mohon cek kembali format yang digunakan.";
            return redirect()->route('dosens.index')->with('error', $msg);
        }
    }
}
