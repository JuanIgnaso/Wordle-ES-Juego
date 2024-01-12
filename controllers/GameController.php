<?php

namespace app\controllers;

use app\models\Categoria;
use app\models\Palabra;
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\Controller;
use juanignaso\phpmvc\Request;

class GameController extends Controller
{
    public function juego(Request $request)
    {
        $categorias = new Categoria();

        $this->setLayout('mainGame');

        return $this->render('juego', [
            'categorias' => $categorias->getAll(),
        ]);
    }

    public function getPalabra(Request $request)
    {
        $model = new Palabra();

        if ($request->isPost()) {
            $model->loadData($request->getBody());
            $array = $model->getByCategory();
            #implica que si hay palabras
            if (count($array) != 0) {
                $palabra = $array[rand(0, count($array) - 1)];
                Application::$app->response->setStatusCode(200);
                echo json_encode(['palabra' => $array[rand(0, count($array) - 1)]]);
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