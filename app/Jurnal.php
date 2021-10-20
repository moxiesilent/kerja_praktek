<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id';

    public function dosens(){
        return $this->belongsTo("App\Dosen","dosen_nip");
    }
}
