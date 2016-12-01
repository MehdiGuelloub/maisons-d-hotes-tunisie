<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageMaison extends Model
{
	public $timestamps = false;
	
    protected $fillable = [
    	'maison_id',
    	'path',
    ];

    public function maison()
    {
        return $this->belongsTo('App\Maison');
    }
}
