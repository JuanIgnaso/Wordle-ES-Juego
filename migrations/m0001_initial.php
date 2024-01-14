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
        create table if not exists categoria(
            id int not null auto_increment primary key,
            nombre_categoria varchar(60) not null unique
            );
            insert into categoria (nombre_categoria) values('predeterminado'),('colores'),('paises'),('deportes'),('frutas'),('informatica');
            
            create table if not exists palabras(
            id int not null auto_increment primary key,
            palabra varchar(15) not null unique,
            categoria int default '1',
            CONSTRAINT FK_categoria FOREIGN KEY (categoria)
            REFERENCES categoria(id) ON DELETE SET DEFAULT
            );
            
            insert into palabras (palabra,categoria) values
            ('dado',1),
            ('estufa',1),
            ('percha',1),
            ('azul',2),
            ('violeta',2),
            ('naranja',2),
            ('francia',3),
            ('bulgaria',3),
            ('canada',3),
            ('futbol',4),
            ('baloncesto',4),
            ('volley',4),
            ('mandarina',5),
            ('pera',5),
            ('arandano',5),
            ('procesador',6),
            ('byte',6),
            ('software',6);
            
            CREATE TABLE if not exists usuarios(
                        id int AUTO_INCREMENT PRIMARY KEY,
                        nombre varchar(60) unique NOT NULL,
                        email varchar(70) unique NOT NULL,
                        password varchar(255) NOT NULL,
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
        $SQL = "DROP TABLE usuarios;
                DROP TABLE palabras;
                DROP TABLE categoria;"
        ;
        $db->pdo->exec($SQL);
        echo 'deshaciendo migración' . PHP_EOL;
    }
}