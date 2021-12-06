<?php

namespace App\Imports;

use App\Mengambil;
use App\Mengajar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MengambilImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $mengajars;

    public function __construct(){
        $this->mengajars = Mengajar::all();
    }

    public function model(array $row)
    {
        $mengajars = $this->mengajars->where('matakuliah_kodemk', '=', $row['kode_mk'])->where('kp', '=', $row['kelas_paralel'])->first();
        return new Mengambil([
            'mahasiswas_idmahasiswa'  => $row['nrp'],
            'mengajars_idmengajars' => $mengajars->idmengajars,
        ]);
    }
}
