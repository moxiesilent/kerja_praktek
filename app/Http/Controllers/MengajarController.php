<?php

namespace App\Http\Controllers;

use App\Mengajar;
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
        $currentuserid = Auth::user()->email;
        $queryRaw = DB::select(DB::raw("SELECT matakuliahs.kodemk, matakuliahs.namamk, jammulai,
        jamberakhir,ruangan, semesters.nama_semester FROM mengajars inner join dosens on mengajars.dosen_nip = dosens.nip 
        inner join matakuliahs on mengajars.matakuliah_kodemk = matakuliahs.kodemk INNER JOIN semesters on 
        mengajars.semester_idsemester = semesters.idsemester where dosens.email = '$currentuserid'"));

        return view("logindosen.index",["data"=>$queryRaw]);
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
