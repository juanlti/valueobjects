<?php

namespace App\Models;

use App\Casts\Email;
use App\Casts\Name;

use App\Casts\Url;
use App\ValueObjects\Concretes\FullName;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //cuando se accede a un atributo, automaticamente se crea  un valueObjectEmail
    // $firstCustomer = Customer::find(1);
    //$email = firstCustomer->email
    //$email no es un string sino que es un valueObject de la clase Email
    protected $casts = [
        'name' => Name::class,
        'lastname' => Name::class,
        'email' => Email::class,
        'website' => Url::class,
    ];

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn() => FullName::from(
                $this->name->value() . ' ' . $this->lastname->value(),
            ));

    }

}
