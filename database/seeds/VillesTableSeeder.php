<?php

use Illuminate\Database\Seeder;

class VillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $v1 = new App\Ville();
        $v1->name = 'Tunis';
        $v1->save();

		$v2 = new App\Ville();
        $v2->name = 'Sousse';
        $v2->save();

        $v3 = new App\Ville();
        $v3->name = 'Sfax';
        $v3->save();

		$v4 = new App\Ville();
        $v4->name = 'Monastir';
        $v4->save();

    }
}
