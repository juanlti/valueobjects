<?php

namespace App\ValueObjects\Primitives;

use App\ValueObjects\ValueObject;
use Illuminate\Support\Stringable;


class Boolean extends ValueObject
{

    protected bool $value;

    protected array $trueValues = ['true', '1', 'yes', 'on', 1];
    protected array $falseValues = ['false', '0', 'no', 'off', 0];

    protected function __construct(bool|int|string $value)
    {

        is_bool($value) ? $this->value = $value : $this->handleNonBoolean($value);
    }

    public function handleNonBoolean(int|string $value): void
    {

        $stringValue = new Stringable($value);

        $this->value = match (true) {
            $stringValue->contains($this->trueValues, ignoreCase: true) => true,
            $stringValue->contains($this->falseValues, ignoreCase: true) => false,
            default => throw new \InvalidArgumentException('El valor no es valido'),

        };
    }
    public function toString():string{
        return $this->value ? 'true' : 'false';
    }
    public function value(): bool
    {
        return $this->value;
    }
}
