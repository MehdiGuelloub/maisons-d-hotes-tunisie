<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MaisonsTableSeeder::class);
        $this->call(VillesTableSeeder::class);
        $this->call(MobileUsersTableSeeder::class);
    }
}
