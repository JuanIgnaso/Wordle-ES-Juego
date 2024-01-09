<?php

namespace app\models;

use juanignaso\phpmvc\db\DBmodel;
use juanignaso\phpmvc\Model;

class Palabra extends DBmodel
{
    public string $id = '';
    public string $palabra = '';
    public string $categoria;

    public function rules(): array
    {
        return [
            'palabra' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            'categoria' => [self::RULE_REQUIRED],
        ];
    }

    public function tableName(): string
    {
        return 'palabras';
    }

    public function getAll()
    {
        $tableName = $this->tableName();
        return self::query("SELECT palabras.id,palabras.palabra,categoria.nombre_categoria  FROM $tableName LEFT JOIN categoria ON palabras.categoria = categoria.id")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function labels(): array
    {
        return [
            'palabra' => 'Palabra',
            'categoría' => 'Categoría',
        ];
    }


    public function attributes(): array
    {
        return ['palabra', 'categoria'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

}