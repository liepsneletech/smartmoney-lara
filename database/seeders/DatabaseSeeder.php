<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        DB::table('users')->insert([
            'email' => 'monika@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'email' => 'zilva@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('accounts')->insert([
            'name' => 'Agota',
            'surname' => 'Kaminskaitė',
            'personal-number' => '49003300550',
            'iban' => 'LT690014710109976744',
            'balance' => 0,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Žilvinas',
            'surname' => 'Plūktenis',
            'personal-number' => 28003300550,
            'iban' => 'LT420014710109976985',
            'balance' => 8976.25,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Rimvydas',
            'surname' => 'Meškauskas',
            'personal-number' => 38003300545,
            'iban' => 'LT660014710109996587',
            'balance' => 330.50,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Sofija',
            'surname' => 'Juhhan',
            'personal-number' => 48003307122,
            'iban' => 'LT720014710109996566',
            'balance' => 100698,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Oksana',
            'surname' => 'Savčiuk',
            'personal-number' => 48003307122,
            'iban' => 'LT720014710109996566',
            'balance' => 10255.70,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Mėta',
            'surname' => 'Serbentaitė',
            'personal-number' => 46003307698,
            'iban' => 'LT450014710109996658',
            'balance' => 13227.15,
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}