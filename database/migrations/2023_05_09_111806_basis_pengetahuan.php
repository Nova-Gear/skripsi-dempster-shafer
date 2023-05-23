<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BasisPengetahuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basis_pengetahuan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit', 5);
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('penyakit')->onDelete('cascade');
            $table->string('kode_gejala', 5);
            $table->foreign('kode_gejala')->references('kode_gejala')->on('gejala')->onDelete('cascade');
            $table->decimal('densitas');
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
        Schema::dropIfExists('basis_pengetahuan');
    }
}
