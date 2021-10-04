<?php

namespace App\Http\Controllers;

use App\Mengajar;
use App\Dosen;
use App\Semester;
use App\Matakuliah;
use Illuminate\Http\Request;
use DB;
use Auth;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Mengajar::all();
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();

        $data = DB::select(DB::raw("SELECT idmengajars, dosens.nama as dosen, mengajars.dosen2 as dosen2, matakuliahs.namamk as namamk, matakuliahs.kodemk as kodemk, matakuliahs.sks as sks, 
        matakuliahs.sks as sks, hari, jammulai, jamberakhir, ruangan FROM `mengajars` inner join dosens on mengajars.dosen_nip = dosens.nip 
        inner join matakuliahs on mengajars.matakuliah_kodemk = matakuliahs.kodemk inner join semesters on 
        semester_idsemester = semesters.idsemester"));

        return view("mengajar.index",compact('data', 'dosen', 'matakuliah'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function show(Mengajar $mengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function edit(Mengajar $mengajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mengajar $mengajar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mengajar $mengajar)
    {
        //
    }
}
