<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plotting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('divisi');
            $table->string('gedung');
            $table->string('lantai');
            $table->string('status');
            $table->string('rencana_divisi');
            $table->string('tanggal_masuk');
            $table->string('tanggal_keluar');
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
        Schema::dropIfExists('plotting');
    }
}
