<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['title', 'price', 'owner_id', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
