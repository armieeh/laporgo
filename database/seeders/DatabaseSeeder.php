<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Petugas::create([
            'nama' => 'tatang',
            'username' => 'ttg',
            'password' => Hash::make('123123123'),
            'telp' => '089671546135',
            'level' => 'admin'
        ]);

        Masyarakat::create([
            'nik' => '11111111',
            'nama' => 'armi',
            'username' => 'armieeh',
            'password' => Hash::make('123123123'),
            'telp' => '08961111111'
        ]);
    }
}
