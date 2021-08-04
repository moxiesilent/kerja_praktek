<?php

namespace App\Http\Controllers;

use App\Matakuliah;
use Illuminate\Http\Request;
use DB;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Matakuliah::all();
        return view("matakuliah.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Matakuliah();
        $data->kodemk = $request->get('kode');
        $data->namamk = $request->get('nama');
        $data->sks = $request->get('sks');
        $data->save();
        return redirect()->route('matakuliahs.index')->with('status','matakuliah telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        $data = $matakuliah;
        return view("Matakuliah.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $matakuliah->namamk=$request->get('namamk');
        $matakuliah->sks=$request->get('sks');
        $matakuliah->save();
        return redirect()->route('matakuliahs.index')->with('status','data matakuliah berhasil diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        try{
            $matakuliah->delete();
            return redirect()->route('matakuliahs.index')->with('status','data matakuliah berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('matakuliahs.index')->with('error', $msg);
        }
    }
}
