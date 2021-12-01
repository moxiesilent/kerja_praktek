<?php

namespace App\Imports;

use App\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dosen([
            'nip'  => $row['nip'],
            'email' => $row['email'],
            'nama'    => $row['nama'],
            'tanggallahir'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_lahir']),
            'bidangkeahlian'    => $row['bidang_keahlian'],
            'jabatan'    => $row['jabatan'],
            'telepon'    => $row['no_telepon'],
            'riwayat_pendidikan'    => $row['pendidikan'],
            'jenis_kelamin'    => $row['jenis_kelamin'],
            'alamat'    => $row['alamat'],
        ]);
    }
}
