<?php

namespace App\Http\Controllers;

use App\Mengajar;
use App\Dosen;
use App\Mahasiswa;
use App\Semester;
use App\Matakuliah;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Imports\MengajarImport;
use Maatwebsite\Excel\Facades\Excel;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        // $data = Mengajar::all();
        $dosen = Dosen::all();
        $semester = Semester::all();
        $matakuliah = Matakuliah::all();

        // $data = DB::table('mengajars')
        // ->join('dosens', 'mengajars.dosens_nip','=','dosens.nip')
        // ->join('matakuliahs', 'mengajars.matakuliah_kodemk','=','matakuliahs.kodemk')
        // ->join('semesters', 'mengajars.semester_idsemester','=','semesters.idsemester')
        // ->select('idmengajars','matakuliahs.namamk as namamk','matakuliahs.kodemk as kodemk','matakuliahs.sks as sks','hari','jammulai','jamberakhir','ruangan','semesters.nama_semester as semester','dosens.nama as dosen')
        // ->paginate(10);

        $data = DB::select(DB::raw("SELECT idmengajars, dosens.nama as dosen, matakuliahs.namamk as namamk, mengajars.kp as kp, matakuliahs.kodemk as kodemk, matakuliahs.sks as sks, 
        matakuliahs.sks as sks, hari, jammulai, jamberakhir, ruangan, semesters.nama_semester as semester FROM `mengajars` inner join dosens on mengajars.dosens_nip = dosens.nip 
        inner join matakuliahs on mengajars.matakuliah_kodemk = matakuliahs.kodemk inner join semesters on 
        semester_idsemester = semesters.idsemester ORDER BY idmengajars"));

        return view("mengajar.index",compact('data', 'dosen', 'matakuliah', 'semester'));
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
        $this->authorize('admin');
        try{
            $data = new Mengajar();
            $data->dosens_nip = $request->get('dosen');
            $data->dosens_nip2 = $request->get('dosen2');
            $data->dosens_nip3 = $request->get('dosen3');
            $data->matakuliah_kodemk = $request->get('matakuliah');
            $data->jammulai = $request->get('jammulai');
            $data->jamberakhir = $request->get('jamberakhir');
            $data->ruangan = $request->get('ruangan');
            $data->hari = $request->get('hari');
            $data->semester_idsemester = $request->get('semester');
            $data->save();
            return redirect()->route('mengajars.index')->with('status','jadwal baru telah ditambahkan'); 
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
            return redirect()->route('mengajars.index')->with('error', $msg);
        }
        
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
        $this->authorize('admin');
        $dosen = Dosen::all();
        $semester = Semester::all();
        $matakuliah = Matakuliah::all();
        $data = $mengajar;
        return view("Mengajar.edit",compact('data','dosen','semester','matakuliah'));
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
        $this->authorize('admin');
        try{
            $mengajar->dosens_nip = $request->get('dosen');
            $mengajar->matakuliah_kodemk = $request->get('matakuliah');
            $mengajar->jammulai = $request->get('jammulai');
            $mengajar->jamberakhir = $request->get('jamberakhir');
            $mengajar->ruangan = $request->get('ruangan');
            $mengajar->hari = $request->get('hari');
            $mengajar->semester_idsemester = $request->get('semester');
            $mengajar->save();
            return redirect()->route('mengajars.index')->with('status','jadwal telah diubah');     
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data. ";
            return redirect()->route('mengajars.index')->with('error', $msg);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mengajar $mengajar)
    {
        $this->authorize('admin');
        try{
            $mengajar->delete();
            return redirect()->route('mengajars.index')->with('status','data jadwal berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('mengajars.index')->with('error', $msg);
        }
    }

    public function getMengajars(Request $request){
        $this->authorize('admin');
        $idsemester = $request->get("idsemester");

        $data = DB::select(DB::raw("SELECT idmengajars, dosens.nama as dosen, matakuliahs.namamk as namamk, matakuliahs.kodemk as kodemk, matakuliahs.sks as sks, 
        matakuliahs.sks as sks, hari, jammulai, jamberakhir, ruangan FROM `mengajars` inner join dosens on mengajars.dosens_nip = dosens.nip 
        inner join matakuliahs on mengajars.matakuliah_kodemk = matakuliahs.kodemk inner join semesters on 
        semester_idsemester = semesters.idsemester where semesters.idsemester = '$idsemester'"));

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('mengajar.index',compact('data'))->render()
        ),200);
    }

    public function detailMengajar($id){
        $this->authorize('admin');
        $mahasiswa = Mahasiswa::all();
        $queryRaw = DB::select(DB::raw("SELECT idmengajars, jammulai, jamberakhir, ruangan, hari, dosens.nip as dosenNip, dosens.nama as namaDosen, mengajars.dosens_nip2 as dos2, mengajars.dosens_nip3 as dos3, matakuliahs.kodemk as kodemk,
        matakuliahs.namamk as namamk, matakuliahs.sks as sks, semesters.nama_semester as semester FROM mengajars INNER JOIN dosens ON mengajars.dosens_nip =
        dosens.nip INNER JOIN matakuliahs ON mengajars.matakuliah_kodemk = matakuliahs.kodemk INNER JOIN semesters ON mengajars.semester_idsemester = semesters.idsemester
        WHERE mengajars.idmengajars = '$id'"));

        $queryRaw2 = DB::select(DB::raw("SELECT idmahasiswa as nim, mahasiswas.nama as nama FROM mahasiswas INNER JOIN mengambils ON idmahasiswa = mahasiswas_idmahasiswa
        WHERE mengajars_idmengajars = '$id'"));

        return view("mengajar.ambil",["data"=>$queryRaw,"mahasiswa"=>$mahasiswa,"ambil"=>$queryRaw2]);
    }

    public function import(Request $request)
    {
        Excel::import(new MengajarImport, request()->file('file'));
        return back()->with('status', 'Berhasil import');
    }
}
