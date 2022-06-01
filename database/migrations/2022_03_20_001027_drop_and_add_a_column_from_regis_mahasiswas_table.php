<?php

use App\Models\Prodi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAndAddAColumnFromRegisMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regis_mahasiswas', function (Blueprint $table) {
            // $table->foreignIdFor(Prodi::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regis_mahasiswas', function (Blueprint $table) {
            //
        });
    }
}
