<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array'
    ];

//    const SEARCHABLE_FIELDS = ['id', 'title'];
//
//    public function toSearchableArray()
//    {
//        return $this->only(self::SEARCHABLE_FIELDS);
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subcategories(){
        return $this->belongsTo('App\Subcategory');
    }

}
