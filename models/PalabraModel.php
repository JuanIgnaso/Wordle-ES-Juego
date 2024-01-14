<?php

namespace app\models;

use juanignaso\phpmvc\db\DBmodel;
use juanignaso\phpmvc\Model;

class PalabraModel extends DBmodel
{
    public string $id = '';
    public string $palabra = '';
    public string $categoria;

    public function rules(): array
    {
        return [
            'palabra' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class], [self::RULE_REGEX, 'regex' => '/^[a-zA-Z]{3,15}$/', 'text' => 'la palabra solo debe de contener letras entre 3 y 15 caracteres']],
            'categoria' => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        $this->palabra = strtolower($this->palabra);
        return parent::save();
    }

    public function delete(): bool
    {
        $this->palabra = strtolower($this->palabra);
        return parent::delete();
    }

    public function tableName(): string
    {
        return 'palabras';
    }

    public function getAll()
    {
        $tableName = $this->tableName();
        return self::query("SELECT palabras.id,palabras.palabra,palabras.categoria,categoria.nombre_categoria  FROM $tableName LEFT JOIN categoria ON palabras.categoria = categoria.id")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getByCategory()
    {
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT palabra FROM $tableName WHERE categoria = :categoria");
        $statement->bindValue(":categoria", $this->categoria);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
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