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

        DB::table('accounts')->insert([
            'name' => 'Piotras',
            'surname' => 'Kutlevič',
            'personal-number' => 27003307654,
            'iban' => 'LT670014710101234569',
            'balance' => 20897.99,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Dalia',
            'surname' => 'Miežienė',
            'personal-number' => 46003354896,
            'iban' => 'LT980014710101234532',
            'balance' => 170000.50,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Marius',
            'surname' => 'Liepnys',
            'personal-number' => 25003363598,
            'iban' => 'LT660014710101234532',
            'balance' => 600,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Kazys',
            'surname' => 'Liepnys',
            'personal-number' => 29003356589,
            'iban' => 'LT470014710101265478',
            'balance' => 155.45,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Kazys',
            'surname' => 'Boruta',
            'personal-number' => 27003351478,
            'iban' => 'LT360014710101698745',
            'balance' => 200000,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Simona',
            'surname' => 'Dambrauskytė',
            'personal-number' => 45003356655,
            'iban' => 'LT390014710101696687',
            'balance' => 0,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Irma',
            'surname' => 'Žurauskaitė',
            'personal-number' => 49003354477,
            'iban' => 'LT520014710101696578',
            'balance' => 14820.15,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Silvan',
            'surname' => 'Klerr',
            'personal-number' => 39003357663,
            'iban' => 'LT770014710101644587',
            'balance' => 800.95,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Brigita',
            'surname' => 'Pempė',
            'personal-number' => 49003354477,
            'iban' => 'LT360014710101448855',
            'balance' => 0,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Paulina',
            'surname' => 'Klimienė',
            'personal-number' => 39003399476,
            'iban' => 'LT420014710101696777',
            'balance' => 0,
        ]);

        DB::table('accounts')->insert([
            'name' => 'Kristupas',
            'surname' => 'Burnys',
            'personal-number' => 29003354788,
            'iban' => 'LT220014710101696632',
            'balance' => 2000.26,
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}