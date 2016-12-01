<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
	protected $fillable = [
		'name',
		'main_picture',
		'folder',
		'ville_id',
		'presentation',
		'services',
		'contact',
		'longitude',
		'latitude',
		'pictures',
	];
    
    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }

    public function images()
    {
        return $this->hasMany('App\ImageMaison');
    }
}
