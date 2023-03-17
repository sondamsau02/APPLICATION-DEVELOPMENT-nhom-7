<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            
            'description' => 'Admin',
        ]);

        DB::table('roles')->insert([
            
            'description' => 'Staff',
        ]);

        DB::table('roles')->insert([
            
            'description' => 'Trainer',
        ]);

        DB::table('roles')->insert([
            
            'description' => 'Trainee',
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('123'),
            'role_id' => '1',
        ]);
    }
}
