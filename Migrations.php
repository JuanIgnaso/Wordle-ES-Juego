<?php
#la constante __DIR__ se refiere al directorio actual
#Con esto deberíamos poder usar las clases con su correcto
#namespace.
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use juanignaso\phpmvc\Application;


$config = [
    'userClass' => '',
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];


$app = new Application(__DIR__, $config); //<- dirname(__DIR__) es el directorio base de la aplicación

$app->db->applyMigrations();

?>