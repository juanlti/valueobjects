<?php

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;


abstract class ValueObject implements Arrayable
{


    abstract public function value();

    public static function make(mixed ...$value): static
    {

        return new static(...$value);
    }

    public static function from(mixed ...$value): static
    {
        //from lo utilizamos para crear una instancia desde los modelos, ejemplo: Producto
        return static::make(...$value);
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $this->value() === $valueObject->value();
    }

    public function noEquals(ValueObject $valueObject): bool
    {
        return !$this->equals($valueObject);
    }

    public function toArray(): array
    {
        return (array)$this->value();
    }

    public function toString(): string
    {
        return (string)$this->value();
    }
    public function __toString()
    {
        return $this->toString();
    }

    public function __set(string $name, mixed $value):void
    {
        //metodo magico, sirve
        throw new \Exception("Los ValueObjects son inmutables por lo tanto su valor se puede cambiar.");
    }

}
