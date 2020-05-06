<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class FavoritesListTableSeeder extends Seeder
{
    /**
     * Run the database seeds fav.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 10; $i++) {
            DB::table('favorites_lists')->insert([
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ]);
        }
    }
}
