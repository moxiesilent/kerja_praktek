<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use DB;
use App\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();
        return view("mahasiswa.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = new Mahasiswa();
        $data->idmahasiswa = $request->get('idmahasiswa');
        $data->email = $request->get('email');
        $data->nama = $request->get('nama');
        $data->tanggallahir = $request->get('tanggallahir');
        $data->telepon = $request->get('telepon');
        $data->save();

        $user = new User();
        $user->name = $request->get('nama');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->sebagai = 'mahasiswa';
        $user->save();

        return redirect()->route('mahasiswas.index')->with('status','mahasiswa berhasil ditambahkan');
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
        $mahasiswa->nama=$request->get('nama');
        $mahasiswa->email=$request->get('email');
        $mahasiswa->tanggallahir=$request->get('tanggallahir');
        $mahasiswa->telepon=$request->get('telepon');
        $mahasiswa->save();
        return redirect()->route('mahasiswas.index')->with('status','data mahasiswa berhasil diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        try{
            $mahasiswa->delete();
            return redirect()->route('mahasiswas.index')->with('status','data mahasiswa berhasil dihapus');       
        }
        catch(\PDOException $e){
            $msg ="Gagal menghapus data karena data masih terpakai di tempat lain. ";
            return redirect()->route('mahasiswas.index')->with('error', $msg);
        }
    }
}
