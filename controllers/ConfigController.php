<?php

namespace app\controllers;

use app\models\Categoria;
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
        $model = new Categoria();
        $categoryList = $model->getAll();

        if ($request->isPost()) {

            $model->loadData($request->getBody());

            if ($model->validate() && $model->save()) {
                Application::$app->session->setFlash('success', "Nueva Categoría $model->nombre_categoria ha sido creada!");
                Application::$app->response->redirect('/menuCategorias');
            }
        }

        return $this->render('menuCategorias', [
            'model' => $model,
            'categorias' => $categoryList,
        ]);
    }

    public function deleteCategoria(Request $request)
    {
        $model = new Categoria();

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            if ($model->nombre_categoria == 'Predeterminado') {
                Application::$app->response->setStatusCode(400);
                Application::$app->session->setFlash('error', "La Categoría $model->nombre_categoria no se Puede borrar.");
                exit;
            }

            if ($model->delete()) {
                Application::$app->response->setStatusCode(200);
                Application::$app->session->setFlash('success', "Categoría $model->nombre_categoria ha sido eliminada");
                exit;

            } else {
                http_response_code(400);
                Application::$app->session->setFlash('error', "La Categoría $model->nombre_categoria no existe.");
                exit;
            }
        }
        Application::$app->response->redirect('/menuCategorias');

    }
}