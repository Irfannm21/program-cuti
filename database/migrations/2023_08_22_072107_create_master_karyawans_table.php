<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_karyawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('bagian_id')->constrained()->onDelete('cascade');      
            $table->string("nip")->unique();
            $table->string("no_kk");
            $table->string("no_npwp")->nullable();
            $table->string("no_kontak");
            $table->date('tmk');
            $table->string("shift");
            $table->string("jabatan");
            $table->string("no_rekening")->nullable();
            $table->string("bank")->nullable();
            $table->string("serikat");
            $table->string("gol_darah")->nullable();
            $table->string("file_kk");
            $table->string("file_ktp");
            $table->string("file_photo");
            $table->timestamps();

            $table->foreign('cv_id')->references('id')->on('cvs');
            $table->foreign('bagian_id')->references('id')->on('bagian_depts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_karyawans');
    }
}
