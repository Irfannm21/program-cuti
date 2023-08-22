<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\cv;
use App\Pengalaman;
use Faker\Factory as Faker;
use Carbon\Carbon;

class penglamanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cv = cv::select("id","nik","tanggal_lahir")->get();
        
        $faker = Faker::create("id_ID");
        // Faker untuk membedakan gender
        
        
        for($i=0; $i < 15; $i++ ) {
            $result = $faker->randomElement($cv);
            $today = carbon::create($result->tanggal_lahir);
            $kerja = $faker->dateTimeBetween($today,'+ 19 years')->format('Y-m-d');
            $mulai = $faker->dateTimeBetween($kerja,'+ 10 years')->format('Y-m-d');
            $stop = $faker->dateTimeBetween($mulai,'+ 40 years')->format('Y-m-d');
            $jabatan = $faker->randomElement(["Operator","Staff","Administratasi","Karu","Kasie"]);
            $val = new Pengalaman;
            $val->nama = $faker->company;
            $val->jabatan = $jabatan;
            $val->lokasi = $faker->city;
            $val->gaji = $faker->randomNumber(7);
            $val->masuk = $mulai;
            $val->keluar = $stop;
            $val->alasan = $faker->sentence(7);
            $val->paklaring = $result->nik."_Vaklaring.pdf";

            $result->pengalamans()->save($val);
        }
    }
}
