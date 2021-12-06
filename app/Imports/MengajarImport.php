<?php

namespace App\Imports;

use App\Mengajar;
use App\Semester;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MengajarImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $semesters;

    public function __construct(){
        $this->semesters = Semester::all();
    }

    public function model(array $row)
    {
        $semesters = $this->semesters->where('nama_semester', '=', $row['semester'])->first();
        return new Mengajar([
            'dosens_nip'  => $row['nip_pjmk'],
            'matakuliah_kodemk' => $row['kode_mk'],
            'jammulai'    => $row['jam_mulai'],
            'jamberakhir'    => $row['jam_berakhir'],
            'ruangan'    => $row['ruangan'],
            'semester_idsemester'    => $semesters->idsemester,
            'hari'    => $row['hari'],
            'dosens_nip2'    => $row['nip_dosen_2'],
            'dosens_nip3'    => $row['nip_dosen_3'],
            'kp'    => $row['kelas_paralel'],
        ]);
    }
}
