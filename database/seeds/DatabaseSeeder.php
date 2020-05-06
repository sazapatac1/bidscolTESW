<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database seeder.
     *
     * @return void
     */
    public function run()
    {

        $this->truncateTables([
            'items'
        ]);

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(BidsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FavoritesListTableSeeder::class);
        
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
