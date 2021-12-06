<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = User::all();
        return view('home', compact('data'));
    }

    public function resetpass($id){
        $user = User::find($id);
        $user->password = Hash::make('12345678');
        $user->save();
        return back()->with('status', 'Berhasil Reset');
    }
}
