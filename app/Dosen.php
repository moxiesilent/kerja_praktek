<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'nip';
    protected $keyType = 'string';
    protected $fillable = ['nip', 'email', 'nama', 'tanggallahir', 'bidangkeahlian', 'foto', 'jabatan', 'telepon', 'riwayat_pendidikan', 'jenis_kelamin', 'alamat'];

    public function mengajars(){
        return $this->hasMany("App\Mengajar","dosens_nip","nip");
    }

    public function jurnals(){
        return $this->hasMany("App\Jurnal","dosens_nip","nip");
    }
}
