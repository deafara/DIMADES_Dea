<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Mitra;
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
        User::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        Mitra::insert([
            'name' => 'kedaiku',
            'namaAdminPt' => 'Dea',
            'jk' => 'Perempuan',
            'notelp' => '085720725890',
            'email' => 'dea@gmail.com',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        Kategori::insert([
            'name' => 'Makanan & Minuman',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        Kategori::insert([
            'name' => 'Item',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
