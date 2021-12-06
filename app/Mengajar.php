<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    protected $primaryKey = 'idmengajars';
    public $timestamps=false;
    protected $fillable = ['dosens_nip', 'matakuliah_kodemk', 'jammulai', 'jamberakhir', 'ruangan', 'semester_idsemester', 'hari', 'dosens_nip2', 'dosens_nip3', 'kp'];

    public function semesters(){
        return $this->belongsTo("App\Semester","semester_idsemester");
    }

    public function dosens(){
        return $this->belongsTo("App\Dosen","dosen_nip");
    }

    public function matakuliahs(){
        return $this->belongsTo("App\Matakuliah","matakuliahs_kodemk");
    }
}
