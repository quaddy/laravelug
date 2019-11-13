<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    /** @var string */
    protected $table = 'products';

    /** @var array */
    protected $guarded = [];

    public function manufacturer(): HasOne
    {
        return $this->hasOne(Manufacturers::class, 'id', 'manufacturer_id');
    }
}
