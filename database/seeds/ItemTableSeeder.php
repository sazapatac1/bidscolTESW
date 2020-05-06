<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds item.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 10; $i++) {
            DB::table('items')->insert([
                'name'=>$faker->word,
                'description'=>$faker->text,
                'status' => $faker->randomElement(['Active','Inactive']),
                'initial_bid' =>$faker-> numberBetween($min = 1000, $max = 9000),
                'start_date' => date('Y-m-d H:m:s'),
                'final_date' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 1 years', $timezone = null),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'category_id' => $faker->randomElement(['1','2', '3', '4', '5']),
                'user_id' => $i
            ]);
        }
    }
}
