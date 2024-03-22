<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('admins')->insert([
            'nom_complet' => 'Moustapha KONTEYE',
            'email' => 'admin@gmail.com',
            'telephone' => '770982359',
            'adresse' => 'Keur Massar',
            'password' => Hash::make('admin'),
        ]);
    }
}
