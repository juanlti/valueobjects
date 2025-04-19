<?php

namespace App\Models;

use App\Casts\Money;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $casts=[
        'price' => Money::class
    ];
}
