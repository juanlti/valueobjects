<?php

namespace App\ValueObjects\Primitives;


use App\ValueObjects\ValueObject;

class Number extends ValueObject
{


    protected int|float $number;

    public function __construct(int|float $value)
    {
        $this->validate($value);
        $this->number = $value;


    }

    public function value(): int|float
    {
        return $this->number;
    }


    protected function validate(int|float $value)
    {
        if (!is_numeric($value)) {
            throw new \InvalidArgumentException('El valor  debe ser numerico');
        }
    }
}
