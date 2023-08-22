<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalamen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_id')->constrained()->onDelete('cv_id');      
            $table->string("nama");
            $table->string("jabatan");
            $table->string("lokasi");
            $table->string("gaji");
            $table->date("masuk");
            $table->date("keluar");
            $table->string("alasan");
            $table->string("paklaring");
            $table->timestamps();
            $table->foreign('cv_id')->references('id')->on('cvs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengalamen');
    }
}
