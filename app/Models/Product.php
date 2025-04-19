<?php

namespace App\Models;

use App\Casts\Money;
use App\ValueObjects\Concretes\File;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $casts=[
        'price' => Money::class,
        'image' => File::class
    ];
}
