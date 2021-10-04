<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginmahasiswaController extends Controller
{
    public function index(){
        return view("loginmahasiswa.index");
    }
}
