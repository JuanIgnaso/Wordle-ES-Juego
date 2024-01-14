<?php

namespace app\models;

use juanignaso\phpmvc\db\DBmodel;
use juanignaso\phpmvc\Model;

class CategoriaModel extends DBmodel
{
    public string $id = '';
    public string $nombre_categoria = '';

    public function save()
    {
        $this->nombre_categoria = ucfirst(strtolower($this->nombre_categoria));
        return parent::save();
    }

    public function delete(): bool
    {
        $tableName = $this->tableName();
        $statement = self::prepare("DELETE FROM $tableName WHERE id = :id");
        $statement->bindValue(":id", $this->id);
        $statement->execute();
        return $statement->rowCount() != 0;
    }

    public function getAll()
    {
        return parent::getAll();
    }

    public function rules(): array
    {
        return [
            'nombre_categoria' => [[self::RULE_UNIQUE, 'class' => self::class], self::RULE_WHITE_SPACE, self::RULE_REQUIRED, [self::RULE_REGEX, 'regex' => '/^[a-zA-Z]+( +[a-zA-Z]+)*$/', 'text' => 'solo se permiten letras y espacios, entre 3 y 60 caracteres de largo.']]
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

    public function getCategoryName($id): string
    {
        $statement = self::prepare("SELECT nombre_categoria FROM categoria WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC)['nombre_categoria'];
    }
}