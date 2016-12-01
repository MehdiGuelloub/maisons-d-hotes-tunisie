<?php

use Illuminate\Database\Seeder;

class MobileUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\MobileUser();
        $user->name = 'Mehdi Guelloub';
        $user->email = 'mehdi.guelloub@gmail.com';
        $user->password = bcrypt('1234');
        $user->activated = 1;
        $user->save();
        
        $user = new App\MobileUser();
        $user->name = 'Xxx Yyyy';
        $user->email = 'xxx.yyy@zzz.com';
        $user->password = bcrypt('1234');
        $user->activated = 0;
        $user->save();

		$user = new App\MobileUser();
        $user->name = 'Aaaa Bbbbbb';
        $user->email = 'aaa.bbbb@gmail.com';
        $user->password = bcrypt('1234');
        $user->activated = 1;
        $user->save();
        
        $user = new App\MobileUser();
        $user->name = 'Bla Blabla';
        $user->email = 'bla@gmail.com';
        $user->password = bcrypt('1234');
        $user->activated = 1;
        $user->save();
    }
}
