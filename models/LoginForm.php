<?php

namespace app\models;

use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function login()
    {
        $model = new Usuario(); //Se crea instancia del usuario

        $usuario = $model->findOne(['email' => $this->email]);

        //Si no existe el email
        if (!$usuario) {
            $this->addError('email', 'No existe ningún usuario registrado con este email');
            return false;
        }
        //Si la contraseña no es correcta
        if (!password_verify($this->password, $usuario->password)) {
            $this->addError('password', 'Contraseña incorrecta, prueba de nuevo.');
            return false;
        }

        return Application::$app->login($usuario);
    }

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