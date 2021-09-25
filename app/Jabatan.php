<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $primaryKey = 'idjabatan';
    public $timestamps=false;

    public function dosens(){
        return $this->hasMany("App\Dosen","jabatans_idjabatan","idjabatan");
    }
}
