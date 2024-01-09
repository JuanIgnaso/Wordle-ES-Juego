<?php

namespace app\controllers;

use app\models\Categoria;
use juanignaso\phpmvc\Controller;
use juanignaso\phpmvc\Request;

class GameController extends Controller
{
    public function juego(Request $request)
    {
        $categorias = new Categoria();

        return $this->render('juego', [
            'categorias' => $categorias->getAll(),
        ]);
    }
}