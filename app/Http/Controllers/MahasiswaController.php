<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $data = Mahasiswa::paginate(10);
        return view("mahasiswa.index",compact('data'));
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
        try{
            $data = new Mahasiswa();
            $data->idmahasiswa = $request->get('idmahasiswa');
            $data->email = $request->get('email');
            $data->nama = $request->get('nama');
            $data->tanggallahir = $request->get('tanggallahir');
            $data->telepon = $request->get('telepon');
            $data->jenis_kelamin = $request->get('jeniskelamin');
            $data->save();

            $user = new User();
            $user->name = $request->get('nama');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->sebagai = 'mahasiswa';
            $user->save();

            return redirect()->route('mahasiswas.index')->with('status','mahasiswa berhasil ditambahkan');     
        }
        catch(\PDOException $e){
            $msg ="Gagal menambah data. ";
            return redirect()->route('mahasiswas.index')->with('error', $msg);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $this->authorize('admin');
        $data = $mahasiswa;
        return view("Mahasiswa.edit",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->authorize('admin');
        try{
            $mahasiswa->nama=$request->get('nama');
            $mahasiswa->email=$request->get('email');
            $mahasiswa->tanggallahir=$request->get('tanggallahir');
            $mahasiswa->jenis_kelamin=$request->get('jeniskelamin');
            $mahasiswa->telepon=$request->get('telepon');
            $mahasiswa->save();
            return redirect()->route('mahasiswas.index')->with('status','data mahasiswa berhasil diubah');        
        }
        catch(\PDOException $e){
            $msg ="Gagal mengubah data. ";
            return redirect()->route('mahasiswas.index')->with('error', $msg);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $this->authorize('admin');
        try{
            $mahasiswa->delete();
            return redirect()->route('mahasiswas.index')->with('status','data mahasiswa berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('mahasiswas.index')->with('error', $msg);
        }
    }

    public function import(Request $request)
    {
        Excel::import(new MahasiswaImport, request()->file('file'));
        return back()->with('status', 'Berhasil import');
    }
}
