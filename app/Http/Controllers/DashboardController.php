<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $this->authorize('admin');
        $queryRaw = DB::select(DB::raw("SELECT count('nip') as jumdosen from dosens"));
        $queryRaw2 = DB::select(DB::raw("SELECT count('idmahasiswa') as jummahasiswa from mahasiswas"));
        $queryRaw3 = DB::select(DB::raw("SELECT count('kodemk') as matakuliah from matakuliahs"));
        $queryRaw4 = DB::select(DB::raw("SELECT count('idprestasi') as prestasi from prestasis"));

        return view("dashboard.index",["dosen"=>$queryRaw, "mahasiswa"=>$queryRaw2,"mk"=>$queryRaw3,"prestasi"=>$queryRaw4]);
    }
}
