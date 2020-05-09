<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 5; $i++) {
            DB::table('comments')->insert([
                'description'=> $faker->text,
                'rating'=>$faker-> numberBetween($min = 1, $max = 10),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'user_id' => $i,
                'item_id'=>$i
            ]);
        }
    }
}
