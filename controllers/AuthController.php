<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\Usuario;
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\Controller;
use juanignaso\phpmvc\Request;
use juanignaso\phpmvc\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $model = new Usuario();

        if ($request->isPost()) {
            //Si es post cargas datos de formulario
            $model->loadData($request->getBody());

            if ($model->validate() && $model->save()) {
                //si la validación es correcta y puede insertar
                Application::$app->session->setFlash('success', 'Genial :)! Se ha creado un nuevo usuario!');
                Application::$app->response->redirect('/');
            }
        }

        return $this->render('register', [
            'model' => $model
        ]);
    }

    public function login(Request $request, Response $response)
    {
        $model = new LoginForm();

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            if ($model->validate() && $model->login()) {
                $response->redirect('/');
            }
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}