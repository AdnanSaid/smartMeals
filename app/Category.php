<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [];


    public function subcategories(){
        return $this->hasMany('App\Subcategory');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function recipes(){
        return $this->hasMany('App\Recipe');
    }
}
