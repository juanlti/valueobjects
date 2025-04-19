<?php

namespace App\ValueObjects\Concretes;

use App\ValueObjects\Primitives\Text;
use Illuminate\Support\Stringable;

class Phone extends Text
{

    public function __construct(string|Stringable $value)
    {
        parent::__construct($value);
        $this->validate();

    }

    public function validate(): void
    {
        if (!preg_match('/^[+]?[0-9]{5,15}$/', $this->value())) {

            throw new \InvalidArgumentException('El numero de telefono no es valido');
        }
    }
}
