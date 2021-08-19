<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'kodemk';
    protected $keyType = 'string';
}
