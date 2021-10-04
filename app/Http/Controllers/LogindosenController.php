<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class LogindosenController extends Controller
{
    public function index(){
        $user = Auth::user()->email;

        // $currentuserid = Auth::user()->email;
        // $queryRaw = DB::select(DB::raw("SELECT matakuliahs.kodemk, matakuliahs.namamk, jammulai,
        // jamberakhir,ruangan, semesters.nama_semester FROM mengajars inner join dosens on mengajars.dosen_nip = dosens.nip 
        // inner join matakuliahs on mengajars.matakuliah_kodemk = matakuliahs.kodemk INNER JOIN semesters on 
        // mengajars.semester_idsemester = semesters.idsemester where dosens.email = '$currentuserid'"));

        // return view("logindosen.index",["data"=>$queryRaw]);

        return view("logindosen.index",compact("user"));
    }
}
