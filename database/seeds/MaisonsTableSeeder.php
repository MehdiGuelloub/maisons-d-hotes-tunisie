<?php

use Illuminate\Database\Seeder;

class MaisonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$m = new App\Maison();
		$m->ville_id = '2';
		$m->name = 'Hi';
		$m->main_picture = 'http://www.bonjour-tunisie.com/photos/MaisonHote/5621.jpg';
		$m->folder = 'internet';
		$m->presentation = 'presentation';
		$m->services = 'services';
		$m->longitude = 'longitude';
		$m->latitude = 'latitude';
		$m->contact = 'contact';
		$m->save();

    	$m2 = new App\Maison();
		$m2->ville_id = '2';
		$m2->name = 'Hello';
		$m2->folder = 'internet';
		$m2->main_picture = 'http://www.nachoua.com/Nefta-04-2007/chambre-bleue-01.jpg';
		$m2->presentation = 'presentation';
		$m2->services = 'services';
		$m2->longitude = 'longitude';
		$m2->latitude = 'latitude';
		$m2->contact = 'contact';
		$m2->save();
    }
}
