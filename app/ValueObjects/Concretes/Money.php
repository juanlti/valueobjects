<?php

namespace App\ValueObjects\Concretes;

use App\ValueObjects\Primitives\Number;
use NumberFormatter;

class Money extends Number
{

    protected function __construct(int $value)
    {
        parent::__construct($value);
    }

    public function cents(): int
    {
        // Si `$this->value()` es `12.345`, al multiplicar por `100` obtendríamos `1234.5`.
        return (int)round($this->value() * 100);
    }

    public function formatted(): string
    {
        return (new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY,))->formatCurrency($this->value(), 'USD');
    }

    public function toArray(): array
    {
        return [
            'cents' => $this->cents(),
            'formatted' => $this->formatted(),
        ];
    }


}
