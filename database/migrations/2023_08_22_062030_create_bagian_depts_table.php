<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagianDeptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagian_depts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('departemen_id')->constrained()->onDelete('cascade');    
            $table->timestamps();

            $table->foreign('departemen_id')->references('id')->on('departemens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bagian_depts');
    }
}
