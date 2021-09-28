<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $primaryKey = 'idsemester';
    public $timestamps=false;

    public function mengajars(){
        return $this->hasMany("App\Mengajar","semester_idsemester","idsemester");
    }
}
