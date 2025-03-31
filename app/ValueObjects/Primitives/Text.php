<?php

namespace App\ValueObjects\Primitives;

use App\ValueObjects\ValueObject;
use Illuminate\Support\Stringable;


//string, number, boolean
class Text extends ValueObject
{

    protected string|Stringable $value;

    public function value(): string
    {
        return (string)$this->value;
    }


    protected function __construct(string|Stringable $value)
    {
        $this->value =trim($value);
        $this->validate();

    }

    protected function validate(): void
    {

        if (empty($this->value())) {
            throw new \InvalidArgumentException("El valor no puede estar vacio");
        }
    }


}
