<?php

namespace App\Http\Controllers;

use App\Mengambil;
use Illuminate\Http\Request;
use DB;
use App\Imports\MengambilImport;
use Maatwebsite\Excel\Facades\Excel;

class MengambilController extends Controller
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
        $this->authorize('admin');
        try{
            for($i=0; $i<sizeof($request->mahasiswa); $i++){
                $data = new Mengambil();
                $data->mahasiswas_idmahasiswa = $request->mahasiswa[$i];
                $data->mengajars_idmengajars = $request->get('idmengajar');
                $data->save();
            }
            return back()->with('status','data mahasiswa telah ditambahkan');   
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data karena data sudah ada. ";
            return back()->with('error', $msg);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mengambil  $mengambil
     * @return \Illuminate\Http\Response
     */
    public function show(Mengambil $mengambil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mengambil  $mengambil
     * @return \Illuminate\Http\Response
     */
    public function edit(Mengambil $mengambil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mengambil  $mengambil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mengambil $mengambil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mengambil  $mengambil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mengambil $mengambil)
    {
        //
    }

    public function hapusMahasiswa(Request $request){
        $this->authorize('admin');
        $idmahasiswa = $request->get('idmahasiswa');
        $idmengajar = $request->get("idmengajar");
        $delete = DB::table('mengambils')->where('mahasiswas_idmahasiswa',$idmahasiswa)->where('mengajars_idmengajars',$idmengajar)->delete();
        if($delete){
            return back()->with('status','Data berhasil dihapus');
        }
        else{
            return back()->with('error','Gagal menghapus data');
        }
    }

    public function import(Request $request)
    {
        $this->authorize('admin');
        try{
            Excel::import(new MengambilImport, request()->file('file'));
            return back()->with('status', 'Berhasil import');    
        }
        catch(\PDOException $e){
            $msg ="Gagal mengimport data, mohon cek kembali format yang digunakan.";
            return redirect()->route('dosens.index')->with('error', $msg);
        }
    }
}
