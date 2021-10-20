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

    public function matakuliahDosen(){
        $currentuserid = Auth::user()->email;
        $queryRaw = DB::select(DB::raw("SELECT idmengajars, matakuliahs.kodemk as kodemk, matakuliahs.namamk as namamk, jammulai,
        jamberakhir,ruangan, semesters.nama_semester as semester FROM mengajars inner join dosens on mengajars.dosens_nip = dosens.nip 
        inner join matakuliahs on mengajars.matakuliah_kodemk = matakuliahs.kodemk INNER JOIN semesters on 
        mengajars.semester_idsemester = semesters.idsemester where dosens.email = '$currentuserid'"));

        return view("logindosen.matakuliah",["data"=>$queryRaw]);
    }

    public function getPertemuan(Request $request){
        $idmengajar = $request->get("id");
        $queryRaw = DB::select(DB::raw("SELECT idpertemuan, tanggal FROM pertemuans inner join mengajars on mengajars.idmengajars = 
        pertemuans.mengajars_idmengajars where pertemuans.mengajars_idmengajars = '$idmengajar'"));

        return view("logindosen.pertemuan",["data"=>$queryRaw]);
    }
}
