<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsulrenovasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usul_renovasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('divisi');
            $table->string('gedung');
            $table->string('lantai');
            $table->string('status');
            $table->string('kapasitas');
            $table->string('luas_ruangan');
            $table->string('tanggal_mulai');
            $table->string('tanggal_selesai');
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
        Schema::dropIfExists('usul_renovasi');
    }
}
