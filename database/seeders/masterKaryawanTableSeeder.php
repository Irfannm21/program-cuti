<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\cv;
use App\bagian_dept;
use App\masterKaryawan;

use Faker\Factory as Faker;


class masterKaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cv = cv::all();
        $bagian = bagian_dept::all();

        $faker = Faker::create("id_ID");
        
        for($i=0; $i < 10; $i++) {
            $result_cv = $faker->randomElement($cv);
            $result_bagian = $faker->randomElement($bagian);
            $val = new masterKaryawan;
            $val->bagian_id = $result_bagian->id;
            $val->nip = $faker->randomNumber(4);
            $val->no_kk = $faker->randomNumber(5);
            $val->no_npwp = $faker->randomNumber(7);
            $val->no_kontak = $faker->phoneNumber(12);
            $val->tmk = "2023-01-01";
            $val->shift = $faker->randomElement(["NS","A","B","C"]);
            $val->jabatan = $faker->randomElement(["Staff","Operator","Kasie","Karu"]);
            $val->no_rekening = $faker->randomNumber(9);
            $val->bank = $faker->randomElement(["BRI","BCA","Mandiri","BNI"]);
            $val->serikat = $faker->randomElement(["KSPN","SPM"]);
            $val->gol_darah = $faker->randomElement(["A","B","O","B+"]);
            $val->file_kk = $result_cv->nik."_kk.pdf";
            $val->file_ktp = $result_cv->nik."_kk.pdf";
            $val->file_photo = $result_cv->nik."_kk.pdf";
    
            $result_cv->master()->save($val);
        }

        
    }
}
