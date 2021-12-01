<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(){
        $this->authorize('admin');
        $queryRaw = DB::select(DB::raw("SELECT count('nip') as jumdosen from dosens"));
        $queryRaw2 = DB::select(DB::raw("SELECT count('idmahasiswa') as jummahasiswa from mahasiswas"));
        $queryRaw3 = DB::select(DB::raw("SELECT count('kodemk') as matakuliah from matakuliahs"));
        $queryRaw4 = DB::select(DB::raw("SELECT count('idprestasi') as prestasi from prestasis"));
        $queryRaw5 = DB::select(DB::raw("SELECT count('id') as jumjurnal from jurnals"));
        $queryRaw6 = DB::select(DB::raw("SELECT count('idpenelitian') as jumpenelitian from penelitians"));

        return view("dashboard.index",["dosen"=>$queryRaw, "mahasiswa"=>$queryRaw2,"mk"=>$queryRaw3,"prestasi"=>$queryRaw4, "jurnal"=>$queryRaw5, "penelitian"=>$queryRaw6]);
    }

    public function daftarUser(){
        $this->authorize('admin');
        $data = User::all();
        return view("user.index",compact('data'));
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport, request()->file('file'));
        return back()->with('status', 'Berhasil import');
    }
}
