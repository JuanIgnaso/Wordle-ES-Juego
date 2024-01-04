<?php
use app\models\User;

#la constante __DIR__ se refiere al directorio actual
#Con esto deberíamos poder usar las clases con su correcto
#namespace.
require_once __DIR__ . '/../vendor/autoload.php';

//Para cargar las variables de entorno, sin esto no puedes usarlas.
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use juanignaso\phpmvc\Application;

/*
Array de configuraciones
*/
$config = [
    'userClass' => User::class,
    //Configuración de la base de datos
    'db' => [
        'dsn' => $_ENV['DB_DSN'], //<- variables de entorno se llaman así.
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

/*
 Pasos a seguir para iniciar la app
 1-crear instancia
 2-definir las rutas
 3-iniciar con un $app->run() 
*/

//1
$app = new Application(dirname(__DIR__), $config); //<- dirname(__DIR__) es el directorio base de la aplicación

###DEFINIR RUTAS AQUÍ###

$app->router->get('/', [app\controllers\SiteController::class, 'homePage']);

//2
//$app->router->get/post('/path','file.php')
// $app->router->get('/', [app\controllers\SiteController::class, 'home']);
// $app->router->get('/contactos', [app\controllers\SiteController::class, 'contact']);
// $app->router->post('/contactos', [app\controllers\SiteController::class, 'contact']);
// $app->router->get('/login', [app\controllers\AuthController::class, 'login']);
// $app->router->post('/login', [app\controllers\AuthController::class, 'login']);
// $app->router->get('/register', [app\controllers\AuthController::class, 'register']);
// $app->router->post('/register', [app\controllers\AuthController::class, 'register']);
// $app->router->get('/logout', [app\controllers\AuthController::class, 'logout']);
// $app->router->get('/profile', [app\controllers\AuthController::class, 'profile']);

#$app->router->get('/path',[SiteController::class,'funcion']);

//3
$app->run(); #Manejar todo. <- cuando esto se ejecuta se decide que función ejecutar.
?>