<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\masterKaryawan;
use App\DataCuti;


use Faker\Factory as Faker;
class dataCutiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = masterKaryawan::all();

        $faker = Faker::create("id_ID");

        $result_karyawan = $faker->randomElement($result);

        $val = new DataCuti;
        $val->jenis = "Cuti Tahunan";
        $val->tahun = "2023-01-01";
        $val->jumlah = 12;

        $result_karyawan->cutis()->save($val);
    }
}
