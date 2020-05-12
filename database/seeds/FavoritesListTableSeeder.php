<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class FavoritesListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 10; $i++) {
            DB::table('wishlists')->insert([
                'user_id' => App\User::all()->random()->id,
                'item_id'=> App\Item::all()->random()->id,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ]);
        }
    }
}
