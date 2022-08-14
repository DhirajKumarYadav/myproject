<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class loginseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('login')->insert([
            'name'=>'Dhiraj',
            'email'=>'dhiraj@gmail.com',
            'password'=>Hash::make('12345')
        ]);
        DB::table('login')->insert([
            'name'=>'Niraj',
            'email'=>'Niraj@gmail.com',
            'password'=>Hash::make('12345')
        ]);
    }
}
