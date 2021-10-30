<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $primaryKey = 'idtugas';
    public $timestamps=false;
    protected $table = 'tugass';
}
