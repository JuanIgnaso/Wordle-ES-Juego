# Juego de Wordle-ES
 ## Introducción
 Esta aplicación se trata de un pequeño juego de Wordle, hecho con PHP en un modelo MVC para la parte del BackEnd y manejo de datos y HTML y JS para la parte de la vista.
 
 ## Propósito
 <p>El Objetivo es que el usuario, tenga o no cuenta registrada en la base de datos, pueda jugar al juego cual propósito es el siguiente:</p>
 <p>Adivinar la palabra que el juego ha escogido en base a la categoría seleccionada disponiendo de <strong>hasta 6 intentos</strong></p>
 
 ## Como Poner en Marcha y Probar la aplicación
Para probar la aplicación basta con tener **PHP** instalado o un servidor **Apache con PHP incluido** y un servidor de BBDD activo, en las pruebas se hizo uso de un **contendor Docker con MYSQL**.

La aplicación de debe de ejecutar desde su directorio `./public` , bien con el comando `php -S direccion_host:puerto` dentro del directorio, o haciendo referencia a ella desde el archivo host en caso de utilizar **Apache**

El siguiente paso es crear una Base de Datos a la cual querramos hacer conexión, datos pertinentes a la configuración se encuentran en el archivo de variables de entorno `.env`

 ![imagen de ejemplo del archivo .env](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/0293799b-f16b-4bbb-b8ec-31236aab3ea2)

<ol>
 <li><strong>DSN</strong> escribe ahí el host, el puerto y la base de datos</li>
 <li><strong>DB_USER</strong> el usuario de la base de datos</li>
 <li><strong>DB_PASSWORD</strong> la contraseña que disponga tu base de datos</li>
</ol>

### Poner en marcha la base de datos
Para poder usar la aplicación, antes de entrar por la dirección URL o a la dirección creada por el comando `php -S` desde la **carpeta raíz** y una vez tengas puesto los datos de la Base de datos, escribe por consola el siguiente comando:

`php Migrations.php`

El cual debería insertar las tablas necesarias en tu Base de datos creada, mostrando el siguiente mensaje por consola.

![imagen ejemplo ejecución de comando php Migrations.php](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/8ec8b014-9f70-40dc-b4a7-1ed53d7b27e8)


![Base de datos creada](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/78649e14-c2f8-447d-8974-7c2bfc63191f)

 ## Uso del Juego

A continuación se explica el uso de la aplicación, dispone de log y register y se puede controlar los usuarios desde la base de datos.
 
 ### Login y Register

Accediendo a la url `/register` y rellenando los campos correctos nos creará una cuenta de usuario, el formulario dispone de validación de errores.


![ejemplo campos erroneos](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/84b41af8-80ea-4647-839e-a6794f7a8c27)


![register completado](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/cc7c63a3-c715-48ab-8bcf-16cc392d1fee)

 
 ### Crear y Borrar Palabras y Categorías para el juego
 
 ### El juego
