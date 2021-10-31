<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class LoginmahasiswaController extends Controller
{
    public function index(){
        $currentuserid = Auth::user()->email;
        $queryRaw = DB::select(DB::raw("SELECT namamk, kodemk FROM matakuliahs INNER JOIN mengajars ON 
        matakuliahs.kodemk = mengajars.matakuliah_kodemk INNER JOIN mengambils ON mengajars.idmengajars = mengambils.mengajars_idmengajars 
        INNER JOIN mahasiswas ON mahasiswas.idmahasiswa = mengambils.mahasiswas_idmahasiswa WHERE mahasiswas.email = '$currentuserid'"));

        return view("loginmahasiswa.index",["data"=>$queryRaw]);
    }
}
