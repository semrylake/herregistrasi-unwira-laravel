<?php

use App\Models\Prodi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdiLayananBAAKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi_layanan_b_a_a_k_s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Prodi::class);
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
        Schema::dropIfExists('prodi_layanan_b_a_a_k_s');
    }
}
