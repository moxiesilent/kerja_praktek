<?php

namespace App\Imports;

use App\Mahasiswa;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Mahasiswa::create([
                'idmahasiswa'  => $row['nrp'],
                'email' => $row['email'],
                'nama'    => $row['nama'],
                'tanggallahir'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_lahir']),
                'telepon'    => $row['no_telepon'],
                'jenis_kelamin'    => $row['jenis_kelamin'],
            ]);
            
            User::create([
                'name'  => $row['nama'],
                'email' => $row['email'],
                'password'    => Hash::make($row['password']),
                'sebagai'    => $row['sebagai'],
            ]);
        }
    }
}
