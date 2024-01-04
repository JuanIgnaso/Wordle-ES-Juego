<?php

namespace app\models;

use juanignaso\phpmvc\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function tableName(): string
    {
        return 'usuarios';
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Contraseña',
        ];
    }
}