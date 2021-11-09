<?php

namespace App\Http\Controllers;

use App\Jurnal;
use App\Dosen;
use Illuminate\Http\Request;
use DB;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();

        $data = DB::table('jurnals')
        ->join('dosens', 'jurnals.dosens_nip','=','dosens.nip')
        ->select('id','judul','tahun','lokasi','tingkat','dosens.nama as dosen')
        ->paginate(5);
        
        // $data = DB::select(DB::raw("SELECT jurnals.id as id, judul, tahun, lokasi, tingkat, dosens.nama as dosen FROM jurnals 
        // INNER JOIN dosens ON jurnals.dosens_nip = dosens.nip"));

        return view("jurnal.index",compact('data','dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurnal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Jurnal();
        $data->judul = $request->get('judul');
        $data->tingkat = $request->get('tingkat');
        $data->dosens_nip = $request->get('dosen');
        $data->tahun = $request->get('tahun');
        $data->lokasi = $request->get('lokasi');
        $data->save();
        return redirect()->route('jurnals.index')->with('status','jurnal baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function show(Jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurnal $jurnal)
    {
        $dosen = Dosen::all();
        $data = $jurnal;
        return view("jurnal.edit",compact('data','dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurnal $jurnal)
    {
        $jurnal->judul = $request->get('judul');
        $jurnal->tingkat = $request->get('tingkat');
        $jurnal->dosens_nip = $request->get('penulis');
        $jurnal->tahun = $request->get('tahun');
        $jurnal->lokasi = $request->get('lokasi');
        $jurnal->save();
        return redirect()->route('jurnals.index')->with('status','jurnal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurnal  $jurnal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurnal $jurnal)
    {
        try{
            $jurnal->delete();
            return redirect()->route('jurnals.index')->with('status','data jurnal berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('jurnals.index')->with('error', $msg);
        }
    }
}
