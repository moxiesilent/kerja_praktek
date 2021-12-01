<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'kodemk';
    protected $keyType = 'string';
    protected $fillable = ['kodemk', 'namamk', 'sks'];

    public function mengajars(){
        return $this->hasMany("App\Mengajar","matakuliah_kodemk","kodemk");
    }
}
