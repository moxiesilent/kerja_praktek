<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class LoginmahasiswaController extends Controller
{
    public function index(){
        $currentuserid = Auth::user()->email;
        $queryRaw = DB::select(DB::raw("SELECT namamk, kodemk, mengajars.idmengajars as idmengajar FROM matakuliahs INNER JOIN mengajars ON 
        matakuliahs.kodemk = mengajars.matakuliah_kodemk INNER JOIN mengambils ON mengajars.idmengajars = mengambils.mengajars_idmengajars 
        INNER JOIN mahasiswas ON mahasiswas.idmahasiswa = mengambils.mahasiswas_idmahasiswa WHERE mahasiswas.email = '$currentuserid'"));

        return view("loginmahasiswa.index",["data"=>$queryRaw]);
    }

    public function getPertemuan($id){
        $currentuserid = Auth::user()->email;
        $queryRaw = DB::select(DB::raw("SELECT idpertemuan, kodemk, namamk, topik, tanggal FROM matakuliahs INNER JOIN mengajars ON 
        matakuliahs.kodemk = mengajars.matakuliah_kodemk INNER JOIN mengambils ON mengajars.idmengajars = mengambils.mengajars_idmengajars 
        INNER JOIN mahasiswas ON mahasiswas.idmahasiswa = mengambils.mahasiswas_idmahasiswa inner join pertemuans on pertemuans.mengajars_idmengajars
        = mengajars.idmengajars WHERE idmengajars = '$id' and mahasiswas.email = '$currentuserid'"));

        return view("loginmahasiswa.pertemuan",["data"=>$queryRaw]);
    }

    public function getMateri($id){
        $queryRaw = DB::select(DB::raw("SELECT idmateri, file, judul, topik from materis INNER JOIN 
        pertemuans ON pertemuans.idpertemuan = materis.pertemuans_idpertemuan where materis.pertemuans_idpertemuan = '$id'"));

        return view("loginmahasiswa.materi",["data"=>$queryRaw]);
    }

    public function getTugas($id){
        $currentuserid = Auth::user()->email;

        $queryRaw = DB::select(DB::raw("SELECT idtugas, tugass.judul as judul, pertemuans.tanggal as tanggal, topik from pertemuans INNER JOIN 
        tugass ON pertemuans.idpertemuan = tugass.pertemuans_idpertemuan where idpertemuan = '$id'"));

        $queryRaw2 = DB::select(DB::raw("SELECT idmahasiswa FROM mahasiswas where email = '$currentuserid'"));

        $queryRaw3 = DB::select(DB::raw("SELECT tugas_idtugas, mahasiswa_idmahasiswa, file, pengumpulans.tanggal as tanggal FROM pengumpulans INNER JOIN mahasiswas
        ON pengumpulans.mahasiswa_idmahasiswa = mahasiswas.idmahasiswa where mahasiswas.email = '$currentuserid' and tugas_idtugas = $id"));

        return view("loginmahasiswa.tugas",["data"=>$queryRaw,"user"=>$queryRaw2, "kumpul"=>$queryRaw3]);
    }
}
