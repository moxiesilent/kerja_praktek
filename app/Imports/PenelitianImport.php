<?php

namespace App\Imports;

use App\Penelitian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenelitianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penelitian([
            'tahun'    => $row['tahun'],
            'judul'  => $row['judul'],
            'sumber' => $row['sumber_dana'],
            'jumlah_dana'    => $row['jumlah_dana'],
            'tipe'    => $row['tipe']
        ]);
    }
}
