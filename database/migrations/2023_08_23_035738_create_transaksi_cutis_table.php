<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_cuti_id')->constrained()->onDelete('cascade'); 
            $table->date("tanggal");
            $table->string("alasan");
            $table->string("status")->nullable()->default("Diproses");
            $table->string("keterangan")->nullable();
            $table->timestamps();

            $table->foreign('data_cuti_id')->references('id')->on('data_cutis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_cutis');
    }
}
