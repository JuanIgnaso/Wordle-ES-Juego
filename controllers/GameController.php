<?php

namespace app\controllers;

use app\models\CategoriaModel;
use app\models\PalabraModel;
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\Controller;
use juanignaso\phpmvc\Request;

class GameController extends Controller
{
    public function juego(Request $request)
    {
        $categorias = new CategoriaModel();

        $this->setLayout('mainGame');

        return $this->render('juego', [
            'categorias' => $categorias->getAll(),
        ]);
    }

    public function getPalabra(Request $request)
    {
        $model = new PalabraModel();
        $modelCategoria = new CategoriaModel();

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            $array = $model->getByCategory(); //Cogemos todas las palabras de la categoría
            $categoria = $modelCategoria->getCategoryName($model->categoria); //Nombre de la categoría
            #implica que si hay palabras
            if (count($array) != 0) {
                $palabra = $array[rand(0, count($array) - 1)];
                Application::$app->response->setStatusCode(200);
                echo json_encode([
                    'palabra' => $array[rand(0, count($array) - 1)],
                    'categoria' => $categoria
                ]);
                exit;
            } else {
                Application::$app->response->setStatusCode(400);
                echo json_encode(['error' => 'La categoría seleccionada no tiene palabras.']);
                exit;
            }

        }

        Application::$app->response->redirect('/juego');
    }
}