<?php

namespace app\controllers;

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
        return $this->render('menuPalabras');
    }

    public function menuCategorias(Request $request)
    {
        return $this->render('menuCategorias');
    }
}