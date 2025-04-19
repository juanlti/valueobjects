<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use App\ValueObjects\Concretes\File as FileValueObject;

class File implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param array<string, mixed> $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): FileValueObject
    {
        return FileValueObject::from($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param array<string, mixed> $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
