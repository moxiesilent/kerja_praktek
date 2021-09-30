<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'nip';
    protected $keyType = 'string';

    public function mengajars(){
        return $this->hasMany("App\Mengajar","dosens_nip","nip");
    }
}
