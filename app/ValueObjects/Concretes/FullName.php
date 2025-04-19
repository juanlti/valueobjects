<?php

namespace App\ValueObjects\Concretes;
use App\ValueObjects\Primitives\Text;
use Exception;
use Stringable;


class FullName extends Text{

//$fullName =  \App\ValueObjects\Concretes\FullName::from('juancruz barrera Liberati')
    /**
     * @throws Exception
     */
    protected function __construct(string | Stringable $value){
         parent::__construct($value);

         //modificamos el valor, pasando el primer caracteres despues del blanco a mayuscula
         $this->value=ucwords($value);
        $this->validate();
    }


    public function firstname(){

        // xplode(' ', $this->value),0,1) => convierte un string separada por un blanco en un arraglo de string
        //array_slice -> devuelve un subarreglo, es decir una porcion del arreglo original, toma el primer elemento.
        return implode(' ',array_slice(explode(' ', $this->value),0,1));
    }
    public function lastname(){
        return implode(' ',array_slice(explode(' ', $this->value),1));
    }

    public function toArray():array{
           //sobre escribo el metodo de toArray
        return [
            'firstname'=>$this->firstname(),
            'lastname'=>$this->lastname(),

        ];
    }

    /**
     * @throws Exception
     */
    public function validate(): void
    {
        if(count(explode(' ', $this->value))<3){
            throw new Exception('Debe tener un nombre y dos apellidos');
        }
    }


}
