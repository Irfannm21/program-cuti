<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\cv;
use Carbon\Carbon;

class cvTableSeeder extends Seeder
{
    public function run()
    {
        // Faker untuk mengubah menjadi data indon
        $faker = Faker::create("id_ID");
        // Faker untuk membedakan gender
        $gender = $faker->randomElement(["male","female"]);

        for($i=0; $i<=10; $i++) {
            cv::create(
                [
                    "nik" => $faker->nik(),
                    "nama" => $faker->name("male"),
                    "kelamin" => $gender,
                    "agama" => "Islam",
                    "tempat_lahir" => $faker->city,
                    "tanggal_lahir" => $faker->dateTimeBetween('1960-01-01', '2000-01-31'),
                    "status" => "Menikah",
                    "provinsi" => $faker->state,
                    "kabkota" => $faker->city,
                    "kecamatan" => $faker->buildingNumber,
                    "alamat" => $faker->address,
                    "no_kontak" => $faker->phoneNumber,
                    "email" => $faker->email,
                    "kodepos" => $faker->postcode,
                ]
                );
        }
    }
}
