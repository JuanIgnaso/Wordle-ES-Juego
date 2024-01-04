<?php

namespace app\models;

use juanignaso\phpmvc\UserModel;

class Usuario extends UserModel
{

    const STATUS_INACTIVO = 0;
    const STATUS_ACTIVO = 1;
    const STATUS_BORRADO = 2;
    public string $nombre = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public string $id;
    public string $creado_en;
    public int $status = self::STATUS_INACTIVO;

    public function save()
    {
        $this->status = self::STATUS_INACTIVO;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    #Definir reglas de validación
    public function rules(): array
    {
        return [
            'nombre' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public function attributes(): array
    {
        return ['nombre', 'email', 'password', 'status'];
    }

    public function tableName(): string
    {
        return 'usuarios';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getUserName(): string
    {
        return $this->nombre;
    }

    public function labels(): array
    {
        return [
            'nombre' => 'Nombre usuario',
            'email' => 'Email',
            'password' => 'Contraseña',
            'passwordConfirm' => 'Confirmar contraseña'
        ];
    }
}