<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=> 'Electronics',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
 
        DB::table('categories')->insert([
             'name'=> 'Fashion',
             'created_at' => date('Y-m-d H:m:s'),
             'updated_at' => date('Y-m-d H:m:s')
        ]);
 
         DB::table('categories')->insert([
             'name'=> 'Sports',
             'created_at' => date('Y-m-d H:m:s'),
             'updated_at' => date('Y-m-d H:m:s')
         ]);
 
         DB::table('categories')->insert([
             'name'=> 'Motors',
             'created_at' => date('Y-m-d H:m:s'),
             'updated_at' => date('Y-m-d H:m:s'),
         ]);
 
         DB::table('categories')->insert([
             'name'=> 'Home & Garden',
             'created_at' => date('Y-m-d H:m:s'),
             'updated_at' => date('Y-m-d H:m:s')
         ]);
    }
}
