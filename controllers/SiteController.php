<?php

namespace app\controllers;

use juanignaso\phpmvc\Controller;

class SiteController extends Controller
{
    public function homePage()
    {
        return $this->render('home');
    }
}