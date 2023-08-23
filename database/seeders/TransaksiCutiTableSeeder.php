<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\DataCuti;
use App\TransaksiCuti;
use Carbon\CarbonPeriod;
use Carbon\Carbon;

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
        $mulai = carbon::create("2023-01-01");
        $selesai = carbon::create("2023-01-02");

        $periode = CarbonPeriod::create($mulai,$selesai);
        $result = DataCuti::findOrFail(1);
        foreach ($periode as $i => $date) {
            $val = new TransaksiCuti;
            $val->tanggal = $date;
            $val->alasan = "Keperluan Keluarga";
            $result->transaksiCutis()->save($val);
        }


       

        

        $result->transaksiCutis()->save($val);
    }
}
