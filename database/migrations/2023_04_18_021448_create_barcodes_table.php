<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcodes', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lokasi');
            $table->string('nik');
            $table->string('kelompok');
            $table->integer('kelompokno');
            $table->string('brand');
            $table->integer('no_box');
            $table->integer('no_bal');
            $table->string('barcode');
            $table->date('tgl_input');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //  $table->foreignId('id_karyawan')->constrained('karyawan')->onUpdate('cascade')->onDelete('cascade');
    public function down()
    {
        Schema::dropIfExists('barcodes');
    }
};
