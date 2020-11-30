<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenovasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renovasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nosurat_permintaan');
            $table->string('lkl');
            $table->string('layout');
            $table->string('approval_layout');
            $table->string('anggaran_dana');
            $table->string('vendor');
            $table->string('spk');
            $table->string('pengerjaan_lapangan');
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
        Schema::dropIfExists('renovasi');
    }
}