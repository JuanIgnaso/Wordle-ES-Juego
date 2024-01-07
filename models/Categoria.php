<?php

namespace app\models;

use juanignaso\phpmvc\CategoriaModel;
use juanignaso\phpmvc\db\DBmodel;
use juanignaso\phpmvc\Model;

class Categoria extends DBmodel
{
    public string $id;
    public string $nombre_categoria = '';

    public function save()
    {
        $this->nombre_categoria = ucfirst(strtolower($this->nombre_categoria));
        return parent::save();
    }

    public function delete(): bool
    {
        $this->nombre_categoria = ucfirst(strtolower($this->nombre_categoria));
        return parent::delete();
    }

    public function getAll()
    {
        return parent::getAll();
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

    public function attributes(): array
    {
        return ['nombre_categoria'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }
}