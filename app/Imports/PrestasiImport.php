<?php

namespace App\Imports;

use App\Prestasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PrestasiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Prestasi([
            'namakegiatan'  => $row['nama_kegiatan'],
            'tingkat' => $row['tingkat'],
            'prestasi'    => $row['pencapaian'],
            'tahun'    => $row['tahun'],
        ]);
    }
}
