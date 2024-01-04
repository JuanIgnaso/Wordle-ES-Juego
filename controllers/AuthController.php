<?php

namespace app\controllers;

use app\models\Usuario;
use juanignaso\phpmvc\Controller;
use juanignaso\phpmvc\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $model = new Usuario();
        return $this->render('register', [
            'model' => $model
        ]);
    }
}