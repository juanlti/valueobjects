<?php

namespace App\ValueObjects\Concretes;

use App\ValueObjects\ValueObject;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class File extends ValueObject
{

    protected UploadedFile $value;

    protected function __construct(protected readonly string $path)
    {

        $this->validate();
        // Inicializa la propiedad 'value' con la información del archivo cargado
        $this->value = new UploadedFile(Storage::disk('public')->path($path), basename($path));
    }

    public function toArray(): array
    {
        return[
            'filename' => $this->filename(),
            'extension' => $this->extension(),
            'mimetype' => $this->mimetype(),
            'size' => $this->size(),
            'path' => $this->path(),
            'absolutePath' => $this->absolutePath(),
            'url' => Storage::disk('public')->url($this->path()),
        ];
    }

    public function value():UploadedFile{
        return $this->value;
    }

    public function filename(): string
    {
        return $this->value->getClientOriginalName();
    }
    public function extension(): string
    {
        return $this->value->getClientOriginalExtension();
    }
    public function mimetype(): string
    {
        return $this->value->getMimeType();
    }
    public function size(): int
    {
        return $this->value->getSize();
    }
    public function path(): string
    {
        return $this->value->getPath();
    }
    public function absolutePath(): string
    {
        return $this->value->getRealPath();
    }

    protected function validate(): void
    {
        if (!$this->value->isFile()) {
            throw new \InvalidArgumentException('No es un archivo');

        }
    }

}
