<?php

namespace app\models;

use juanignaso\phpmvc\Model;

class WordModel extends Model
{
    public string $id;
    public string $palabra;
    public int $categoria;

    public function rules(): array
    {
        return [
            'palabra' => [self::RULE_REQUIRED, self::RULE_UNIQUE],

        ];
    }

    public function tableName(): string
    {
        return 'palabras';
    }

    public function labels(): array
    {
        return [
            'palabra' => 'Palabra',
            'categoría' => 'Categoría',
        ];
    }

}