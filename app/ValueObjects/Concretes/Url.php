<?php

namespace App\ValueObjects\Concretes;


use App\ValueObjects\Primitives\Text;
use Illuminate\Support\Stringable;

class Url extends Text
{

    //constructor
    /**
     * @throws \Exception
     */
    public function __construct(string|Stringable $value)
    {
        parent::__construct($value);
        $this->validate();

    }

    public function procotol(): string
    {
        //obtnemos el procolo, ejemplo: https://www.google.com => https
        return parse_url($this->value(), PHP_URL_SCHEME);
    }

    public function domain(): string
    {
        return parse_url($this->value(), PHP_URL_HOST);

    }

    public function toArray(): array
    {
        return [
            'procotol' => $this->procotol(),
            'domain' => $this->domain(),
        ];
    }

    /**
     * @throws \Exception
     */
    protected function validate(): void
    {
        if (!filter_var($this->value, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('La url no es valida');
        }
    }

}
