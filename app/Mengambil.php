<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengambil extends Model
{
    public $timestamps=false;
    protected $fillable = ['mahasiswas_idmahasiswa', 'mengajars_idmengajars'];
}
