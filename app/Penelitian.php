<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'idpenelitian';
    protected $fillable = ['tahun', 'judul', 'sumber', 'jumlah_dana', 'tipe'];
}
