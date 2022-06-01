<?php

use App\Models\Loket;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAColumnToRegisMahasiswas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regis_mahasiswas', function (Blueprint $table) {
            $table->foreignIdFor(Loket::class);
            $table->string('status');
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
