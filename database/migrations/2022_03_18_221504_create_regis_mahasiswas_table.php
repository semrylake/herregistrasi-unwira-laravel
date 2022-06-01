<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regis_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('nim');
            $table->string('tgl_regis');
            $table->string('prodi');
            $table->string('semester');
            $table->string('bank');
            $table->string('keterangan');
            $table->string('wa');
            $table->string('bukti_regis');
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
        Schema::dropIfExists('regis_mahasiswas');
    }
}
