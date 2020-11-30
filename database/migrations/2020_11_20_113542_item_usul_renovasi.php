<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemUsulRenovasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ItemUsulRenovasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('IDUsulRenovasi');
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
            $table->string('PenanggungJawab');
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
        Schema::dropIfExists('ItemUsulRenovasi');
    }
}