<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;
use Illuminate\Facade\File;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Imports\DosenImport;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $data = Dosen::all();
        return view("dosen.index",compact('data'));
    }

    public function profilDosen()
    {
        $data = Dosen::all();
        return view("profildosen",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $data = new Dosen();
        
        $file=$request->file('foto');
        $imgFolder='images';
        $imgFile=time().'_'.$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->foto=$imgFile;

        $data->nip = $request->get('nip');
        $data->nama = $request->get('nama');
        $data->email = $request->get('email');
        $data->tanggallahir = $request->get('tanggallahir');
        $data->jabatan = $request->get('jabatan');
        $data->bidangkeahlian = $request->get('bidang');
        $data->jenis_kelamin = $request->get('jeniskelamin');
        $data->riwayat_pendidikan = $request->get('riwayatpendidikan');
        $data->alamat = $request->get('alamat');
        $data->save();

        $user = new User();
        $user->name = $request->get('nama');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->sebagai = 'dosen';
        $user->save();

        return redirect()->route('dosens.index')->with('status','dosen baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        $this->authorize('admin');
        $data = $dosen;
        return view("Dosen.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $this->authorize('admin');
        $dosen->nama=$request->get('nama');
        $dosen->email=$request->get('email');
        $dosen->tanggallahir=$request->get('tanggallahir');
        $dosen->jabatan=$request->get('jabatan');
        $dosen->bidangkeahlian=$request->get('bidang');
        $dosen->jenis_kelamin = $request->get('jeniskelamin');
        $dosen->riwayat_pendidikan = $request->get('riwayatpendidikan');
        $dosen->alamat = $request->get('alamat');
        if($request->hasFile('foto')){
            $dest='images/'.$dosen->foto;
            if(file_exists($dest)){
                @unlink($dest); 
            }
            $file=$request->file('foto');
            $imgFolder='images';
            $imgFile=time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder,$imgFile);
            $dosen->foto=$imgFile;
        }
        $dosen->save();
        return redirect()->route('dosens.index')->with('status','data dosen berhasil diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $this->authorize('admin');
        try{
            $dosen->delete();
            return redirect()->route('dosens.index')->with('status','data dosen berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('dosens.index')->with('error', $msg);
        }
    }

    public function getDosen($id){
        $queryRaw = DB::select(DB::raw("SELECT * from dosens where nip = '$id'"));

        return view("dosendetail",["data"=>$queryRaw]);
    }

    // public function resetPassword($id){
    //     $pass = Hash::make('12345678');
    //     $queryRaw = DB::select(DB::raw("UPDATE users INNER JOIN dosens ON dosens.email = users.email SET 
    //     users.password = '$pass' WHERE dosens.nip = '$id'"));

    //     return view("dosen.index",["data"=>$queryRaw]);
    // }

    public function detailDosen($id){
        $this->authorize('admin');
        $queryRaw = DB::select(DB::raw("SELECT * from dosens where nip = '$id'"));

        return view("dosen.detail",["data"=>$queryRaw]);
    }

    public function import(Request $request)
    {
        Excel::import(new DosenImport, request()->file('file'));
        return back()->with('status', 'Berhasil import');
    }
}
