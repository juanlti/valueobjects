<?php

namespace App\Models;

use App\Casts\Email;
use App\Casts\Name;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //cuando se accede a un atributo, automaticamente se crea  un valueObjectEmail
    // $firstCustomer = Customer::find(1);
    //$email = firstCustomer->email
    //$email es no string sino que es un valueObject de la clase Email
    protected $casts = [
        'name' => Name::class,
        'lastname' => Name::class,
        'email' => Email::class,
    ];

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn() => FullName::from(
                $this->name->value() . ' ' . $this->lastname->value(),
            ));

    }

}
