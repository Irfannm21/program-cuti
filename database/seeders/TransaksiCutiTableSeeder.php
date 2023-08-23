<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\DataCuti;
use App\TransaksiCuti;

use Faker\Factory as Faker;
class TransaksiCutiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = DataCuti::findOrFail(1);

        $val = new TransaksiCuti;
        $val->mulai = "2023-01-01";
        $val->selesai = "2023-01-01";
        $val->alasan = "Keperluan Keluarga";

        $result->transaksiCutis()->save($val);
    }
}
