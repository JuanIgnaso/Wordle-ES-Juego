<?php

namespace app\controllers;

use app\models\CategoriaModel;
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\Controller;
use juanignaso\phpmvc\middlewares\AuthMiddleware;
use juanignaso\phpmvc\Request;

class ConfigController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['menuPalabras', 'menuCategorias']));
    }
    public function menuPalabras(Request $request)
    {
        return $this->render('menuPalabras', [
            'categorias' => 'boniato',
        ]);
    }

    public function menuCategorias(Request $request)
    {
        $model = new CategoriaModel();

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            if ($model->validate()) {
                Application::$app->session->setFlash('success', "Nueva Categoría $model->nombre_categoria ha sido creada!");
                Application::$app->response->redirect('/menuCategorias');
            }
        }

        return $this->render('menuCategorias', [
            'model' => $model,
        ]);
    }
}