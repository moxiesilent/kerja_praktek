<?php

namespace App\Http\Controllers;

use App\Prestasi;
use Illuminate\Http\Request;
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
        $data = Prestasi::all();
        return view("prestasi.index",compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        //
    }

    public function getEditForm(Request $Request){
        $idprestasi = $request->get("id");
        $data = Prestasi::find($idprestasi);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('prestasi.getEditForm',compact('data'))->render()
        ),200);
    }
}
