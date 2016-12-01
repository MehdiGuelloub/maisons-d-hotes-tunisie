<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'name',
    ];
    
    public function maisons()
    {
        return $this->hasMany('App\Maison');
    }
}
