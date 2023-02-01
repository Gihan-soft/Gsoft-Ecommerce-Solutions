<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([


             //Customer
             [
            'full_name'=>'Gihan Customer',
            'username'=>'Customer',
            'email'=>'customer@gmail.com',
            'password'=>Hash::make('12345678'),
            'status'=>'active',
            ],

        ]);

            //Admin
            DB::table('admins')->insert([

            [
            'full_name'=>'Gihan',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345678'),
            'status'=>'active',
            ],

             
        ]);
    }
}
