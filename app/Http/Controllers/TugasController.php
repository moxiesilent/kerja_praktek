<?php

namespace App\Http\Controllers;

use App\Tugas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Auth;

class TugasController extends Controller
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
        $data = new Tugas();
        $data->judul = $request->get('judul');
        $data->pertemuans_idpertemuan = $request->get('idpertemuan');
        $data->status = 'buka';
        $data->deadline = Carbon::parse($request->get('deadline'))->format('Y-m-d\TH:i');
        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tugas)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
    }

    public function hapusTugas(Request $request){
        $this->authorize('dosen');
        try{
            $idtugas = $request->get("idtugas");
            $delete = DB::table('tugass')->where('idtugas',$idtugas)->delete();
            if($delete){
                return back()->with('status','Tugas berhasil dihapus');
            }
            else{
                return back()->with('error','Gagal menghapus tugas');
            }    
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data. Sudah ada mahasiswa yang mengumpulkan tugas.";
            return back()->with('error', $msg);
        }
        
    }
}
