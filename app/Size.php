<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
        //this translates to the sql query -select * from products where category_id = 1 (i.e., the id of the current category)
    }
}
