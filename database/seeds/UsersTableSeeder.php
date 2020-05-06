<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds user.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 20)->create();
    }
}
