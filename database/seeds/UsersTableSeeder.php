<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $user->name = 'Mehdi Guelloub';
        $user->email = 'mehdi.guelloub@gmail.com';
        $user->password = bcrypt('1234');
        $user->role = 1;
        $user->activated = 1;
        $user->save();

        $user1 = new App\User();
        $user1->name = 'Mohamed Mehdi Guelloub';
        $user1->email = 'mehdi.guelloub@hotmail.fr';
        $user1->password = bcrypt('1234');
        $user1->role = 1;
        $user1->activated = 1;
        $user1->save();
    }
}
