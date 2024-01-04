<?php
use juanignaso\phpmvc\Application;

class m0001_initial
{
    #migraciones, para crear la tabla en una base de datos
    /*
    Si quisieramos aplicar cambios,creariamos otro archivo llamado
    m0002_cambios o m002_columna_en_usuarios, y en up() aplicar la consulta
    para modificar la tabla, y en down() para deshacerla.
    */

    public function up()
    {
        #creariamos una tabla que aplicaría a la base de datos

        #acceder a la base de datos
        $db = Application::$app->db;
        $SQL = "
        CREATE TABLE users(
            id int AUTO_INCREMENT PRIMARY KEY,
            username varchar(60) unique NOT NULL,
            email varchar(70) unique NOT NULL,
            password varchar(255) NOT NULL DEFAULT 'changeme',
            status tinyint NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB;
        ";
        $db->pdo->exec($SQL);
        echo 'Aplicando migración' . PHP_EOL;
    }

    public function down()
    {
        #acceder a la base de datos
        $db = Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
        echo 'deshaciendo migración' . PHP_EOL;
    }
}