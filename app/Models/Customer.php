<?php

namespace App\Models;

use App\Casts\Name;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $casts=[
        'name'=> Name::class,
    ];
}
