<?php

namespace App\Models;

use App\Casts\Name;
use FullName;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $casts = [
        'name' => Name::class,
        'lastname' => Name::class,
    ];

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn() => FullName::from(
                $this->name->value() . ' ' . $this->lastname->value(),
            ));

    }

}
