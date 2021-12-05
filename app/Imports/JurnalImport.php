<?php

namespace App\Imports;

use App\Jurnal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JurnalImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jurnal([
            'judul'  => $row['judul'],
            'tahun'    => $row['tahun'],
            'lokasi' => $row['lokasi'],
            'tingkat'    => $row['tingkat'],
            'dosens_nip'    => $row['nip_dosen']
        ]);
    }
}
