<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $primaryKey = 'idprestasi';
    public $timestamps=false;
    protected $fillable = ['namakegiatan', 'tingkat', 'prestasi', 'tahun'];
}
