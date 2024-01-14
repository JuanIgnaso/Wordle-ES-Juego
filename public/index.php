<?php
use app\models\User;
use app\models\Usuario;

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
    'userClass' => Usuario::class,
    //Configuración de la base de datos
    'db' => [
        'dsn' => $_ENV['DB_DSN'], //<- variables de entorno se llaman así.
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new Application(dirname(__DIR__), $config); //<- dirname(__DIR__) es el directorio base de la aplicación

###DEFINIR RUTAS AQUÍ###

$app->router->get('/', [app\controllers\SiteController::class, 'homePage']);

#REGISTRARSE
$app->router->get('/register', [app\controllers\AuthController::class, 'register']);
$app->router->post('/register', [app\controllers\AuthController::class, 'register']);

#LOGUEARSE
$app->router->get('/login', [app\controllers\AuthController::class, 'login']);
$app->router->post('/login', [app\controllers\AuthController::class, 'login']);

#LOGOUT
$app->router->get('/logout', [app\controllers\AuthController::class, 'logout']);

#CONFIGURACIÓN DE CATEGORÍAS Y PALABRAS
$app->router->get('/menuPalabras', [app\controllers\ConfigController::class, 'menuPalabras']);
$app->router->post('/menuPalabras', [app\controllers\ConfigController::class, 'menuPalabras']);
$app->router->get('/menuCategorias', [app\controllers\ConfigController::class, 'menuCategorias']);
$app->router->post('/menuCategorias', [app\controllers\ConfigController::class, 'menuCategorias']);
$app->router->post('/borrarCategoria', [app\controllers\ConfigController::class, 'borrarCategoria']);
$app->router->get('/borrarCategoria', [app\controllers\ConfigController::class, 'borrarCategoria']);
$app->router->get('/borrarPalabra', [app\controllers\ConfigController::class, 'borrarPalabra']);
$app->router->post('/borrarPalabra', [app\controllers\ConfigController::class, 'borrarPalabra']);

#JUEGO
$app->router->get('/juego', [app\controllers\GameController::class, 'juego']);
$app->router->get('/getPalabra', [app\controllers\GameController::class, 'getPalabra']);
$app->router->post('/getPalabra', [app\controllers\GameController::class, 'getPalabra']);


$app->run(); #Manejar todo. <- cuando esto se ejecuta se decide que función ejecutar.
?>