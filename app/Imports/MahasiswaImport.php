<?php

namespace App\Imports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'idmahasiswa'  => $row['nrp'],
            'email' => $row['email'],
            'nama'    => $row['nama'],
            'tanggallahir'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_lahir']),
            'telepon'    => $row['no_telepon'],
            'jenis_kelamin'    => $row['jenis_kelamin'],
        ]);
    }
}
