<?php

namespace App\ValueObjects\Concretes;

use App\ValueObjects\Primitives\Text;
use http\Exception;


class Email extends Text
{

    public function __construct(string $value)
    {
        parent::__construct($value);

        //todo a minisucula
        $this->value = strtolower($this->value);

        //validar
        $this->validate();


    }

    /**
     * @throws \Exception
     */
    public function validate(): void
    {
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('El email no es valido');
        }
    }

    public function username(): string
    {
        // Devuelve la parte del email antes del símbolo "@"
        return explode('@', $this->value)[0];
    }

    public function domain(): string
    {
        // Devuelve la parte del email despues del símbolo "@"
        return explode('@', $this->value)[1];
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username(),
            'domain' => $this->domain(),
        ];
    }


}
