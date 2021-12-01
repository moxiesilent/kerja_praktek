<?php

namespace App\Imports;

use App\Matakuliah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MatakuliahImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Matakuliah([
            'kodemk'  => $row['kode_mk'],
            'namamk' => $row['nama_mk'],
            'sks'    => $row['sks'],
        ]);
    }
}
