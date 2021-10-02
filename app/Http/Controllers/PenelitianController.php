<?php

namespace App\Http\Controllers;

use App\Penelitian;
use Illuminate\Http\Request;
use DB;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penelitian::all();
        return view("penelitian",compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penelitian  $penelitian
     * @return \Illuminate\Http\Response
     */
    public function show(Penelitian $penelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penelitian  $penelitian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penelitian $penelitian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penelitian  $penelitian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penelitian $penelitian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penelitian  $penelitian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penelitian $penelitian)
    {
        //
    }
}
