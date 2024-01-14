<?php

namespace app\controllers;

use app\models\CategoriaModel;
use app\models\PalabraModel;
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

        $model = new PalabraModel();
        $categorias = new CategoriaModel();

        $palabras = $model->getAll();
        $categoriasList = $categorias->getAll();

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            if ($model->validate() && $model->save()) {
                Application::$app->session->setFlash('success', "Palabra $model->palabra añadida en la Categoría " . $categorias->getCategoryName($model->categoria));
                Application::$app->response->redirect('/menuPalabras');
            }
        }

        #Enviamos el modelo y la lista de categorías/palabras a la vista
        return $this->render('menuPalabras', [
            'model' => $model,
            'categorias' => $categoriasList,
            'palabras' => $palabras,
            'errors' => $model->errors,
        ]);
    }

    public function menuCategorias(Request $request)
    {
        $model = new CategoriaModel();
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

    public function borrarCategoria(Request $request)
    {
        $model = new CategoriaModel();
        $palabraModel = new PalabraModel();

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            $nombre = $model->getCategoryName($model->id);

            $palabraModel->loadData(['categoria' => $model->id]);

            if (count($palabraModel->getByCategory()) != 0) {
                Application::$app->response->setStatusCode(400);
                Application::$app->session->setFlash('error', "La categoría $nombre no se puede borrar debido a que contiene palabras en ella.");
            }

            if ($model->id == 1) {
                Application::$app->response->setStatusCode(400);
                Application::$app->session->setFlash('error', "La Categoría $nombre no se Puede borrar.");
                exit;
            }

            if ($model->delete()) {
                Application::$app->response->setStatusCode(200);
                Application::$app->session->setFlash('success', "Categoría $nombre ha sido eliminada");
                exit;

            } else {
                http_response_code(400);
                Application::$app->session->setFlash('error', "La Categoría $nombre no existe.");
                exit;
            }
        }
        Application::$app->response->redirect('/menuCategorias');

    }

    public function borrarPalabra(Request $request)
    {
        $model = new PalabraModel();
        if ($request->isPost()) {
            $model->loadData($request->getBody());
            if ($model->delete()) {
                Application::$app->response->setStatusCode(200);
                Application::$app->session->setFlash('success', "La palabra $model->palabra ha sido borrada.");
                exit;
            } else {
                Application::$app->response->setStatusCode(400);
                echo $model->palabra;
                echo $model->categoria;
                Application::$app->session->setFlash('error', "Error, la palabra $model->palabra no existe!");
                exit;
            }
        }
        Application::$app->response->redirect('/menuCategorias');

    }


}