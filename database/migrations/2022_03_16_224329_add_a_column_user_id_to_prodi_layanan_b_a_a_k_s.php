<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAColumnUserIdToProdiLayananBAAKS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prodi_layanan_b_a_a_k_s', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prodi_layanan_b_a_a_k_s', function (Blueprint $table) {
            //
        });
    }
}
