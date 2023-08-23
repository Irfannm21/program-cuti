<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_karyawan_id')->constrained()->onDelete('cascade');   
            $table->string("jenis");
            $table->date("tahun");
            $table->integer("jumlah");
            $table->timestamps();

            $table->foreign('master_karyawan_id')->references('id')->on('master_karyawans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_cutis');
    }
}
