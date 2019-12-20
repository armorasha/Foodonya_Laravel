<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
        //this translates to product belongs to category
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
        //this translates to product has many sizes
    }
}
