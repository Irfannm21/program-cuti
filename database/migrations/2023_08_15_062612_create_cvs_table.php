<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use App\cv;
class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string("nik")->unique();
            $table->string("nama");
            $table->string("kelamin");
            $table->string("agama");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("status");
            $table->string("provinsi");
            $table->string("kabkota");
            $table->string("kecamatan");
            $table->string("alamat");
            $table->string("no_kontak");
            $table->string("email");
            $table->string("kodepos");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
}
