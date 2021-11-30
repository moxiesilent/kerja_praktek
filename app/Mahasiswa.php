<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'idmahasiswa';
    protected $fillable = ['idmahasiswa', 'email', 'nama', 'tanggallahir', 'telepon', 'jenis_kelamin'];
}
