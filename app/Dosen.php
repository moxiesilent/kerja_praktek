<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'nip';
    protected $keyType = 'string';

    public function jabatan(){
        return $this->belongsTo("App\Jabatan","idjabatan");
    }
}
