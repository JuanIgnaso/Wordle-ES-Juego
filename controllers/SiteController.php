<?php

namespace app\controllers;

use juanignaso\phpmvc\Controller;

class SiteController extends Controller
{
    /**
     * Carga la página de inicio del sitio
     * 
     */
    public function homePage()
    {
        return $this->render('home');
    }
}