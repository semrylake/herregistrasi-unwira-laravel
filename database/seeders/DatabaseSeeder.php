<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nip' => '23117404',
            'name' => 'Es Teh 404',
            'jk' => 'Laki-laki',
            'level' => 'admin',
            'password' => bcrypt('23117404'),
        ]);
    }
}
