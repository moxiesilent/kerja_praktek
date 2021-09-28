<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    protected $primaryKey = 'idmengajar';
    public $timestamps=false;

    public function semester(){
        return $this->belongsTo("App\Semester","semester_idsemester");
    }
}
