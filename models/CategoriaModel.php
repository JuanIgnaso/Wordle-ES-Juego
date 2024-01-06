<?php

namespace app\models;

use juanignaso\phpmvc\Model;

class CategoriaModel extends Model
{
    public string $nombre_categoria = '';

    public function save()
    {
        $this->nombre_categoria = ucfirst(strtolower($this->nombre_categoria));

    }

    public function rules(): array
    {
        return [
            'nombre_categoria' => [self::RULE_WHITE_SPACE, self::RULE_REQUIRED, [self::RULE_REGEX, 'regex' => '/^[a-zA-Z]+( +[a-zA-Z]+)*$/', 'text' => 'solo se permiten letras y espacios, entre 3 y 60 caracteres de largo.']]
        ];
    }

    public function tableName(): string
    {
        return 'categoria';
    }

    public function labels(): array
    {
        return [
            'nombre_categoria' => 'Nombre de categoría',
        ];
    }
}