<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
                [  
                    'name'=>' abcdefg',
                    'price'=>'100000',
                    'category'=>'aaa',
                    'description'=>' Ram with high definition camera',
                    'gallery'=>'https://images.pexels.com/photos/583843/pexels-photo-583843.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        
                    
                ],
                [
                    'name'=>'xyz',
                    'price'=>'200000',
                    'category'=>'bbb',
                    'description'=>'with high definition camera',
                    'gallery'=>'https://images.pexels.com/photos/583843/pexels-photo-583843.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        
                    
                ],
                [
                    'name'=>' mno',
                    'price'=>'300000',
                    'category'=>'ccc',
                    'description'=>'high definition camera',
                    'gallery'=>'https://images.pexels.com/photos/583843/pexels-photo-583843.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        
                    
                ],
                [
                    'name'=>'pqr',
                    'price'=>'400000',
                    'category'=>'ddd',
                    'description'=>' definition camera',
                    'gallery'=>'https://images.pexels.com/photos/583843/pexels-photo-583843.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
        
                    
                ]
            ]);
    }
}
