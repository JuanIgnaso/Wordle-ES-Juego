<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\Usuario;
use juanignaso\phpmvc\Controller;
use juanignaso\phpmvc\Request;
use juanignaso\phpmvc\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $model = new Usuario();
        return $this->render('register', [
            'model' => $model
        ]);
    }

    public function login(Request $request, Response $response)
    {
        $model = new LoginForm();
        return $this->render('login', [
            'model' => $model
        ]);
    }
}