<?php

namespace App\Imports;

use App\Dosen;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Dosen::create([
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
            
            User::create([
                'name'  => $row['nama'],
                'email' => $row['email'],
                'password'    => Hash::make($row['password']),
                'sebagai'    => $row['sebagai'],
            ]);
        }
    }
}
