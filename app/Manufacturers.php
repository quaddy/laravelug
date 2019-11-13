<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacturers extends Model
{
    /** @var string */
    protected $table = 'manufacturers';

    /** @var array */
    protected $guarded = [];

    public function products(): HasMany
    {
        return $this->hasMany(Products::class, 'manufacturer_id', 'id');
    }
}
