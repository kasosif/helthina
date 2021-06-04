<?php

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
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'name' => 'Jyhen Bellahouel',
                'email' => 'admin@healthina.com',
                'email_verified_at' => now(),
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role' => 'ADMIN',
            ],
            [
                'name' => 'Aladin Chokri',
                'email' => 'membre@healthina.com',
                'email_verified_at' => now(),
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'role' => 'MEMBRE',
            ],
        ]);
    }
}
