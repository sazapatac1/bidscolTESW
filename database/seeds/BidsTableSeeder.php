<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class BidsTableSeeder extends Seeder
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
            DB::table('bids')->insert([
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'bid_value' => $faker-> numberBetween($min = 1000, $max = 9000),
                'item_id'=>$i,
                'user_id' => $i
            ]);
        }
    }
}
