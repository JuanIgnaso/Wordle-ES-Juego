# Juego de Wordle-ES

## Anotaciones
Esta aplicación está en fase de prueba, pero la puedes probar en un equipo que disponga de los requerimientos descritos, se plantea en un futuro Dockerizar la aplicación entera.

 ## Introducción
 Esta aplicación se trata de un pequeño juego de Wordle, hecho con PHP en un modelo MVC para la parte del BackEnd y manejo de datos y HTML y JS para la parte de la vista.
 
 ## Propósito
 <p>El Objetivo es que el usuario, tenga o no cuenta registrada en la base de datos, pueda jugar al juego cual propósito es el siguiente:</p>
 <p>Adivinar la palabra que el juego ha escogido en base a la categoría seleccionada disponiendo de <strong>hasta 6 intentos</strong></p>
 
 ## Como Poner en Marcha y Probar la aplicación

### Requerimientos
<ul>
 <li>PHP Instalado</li>
 <li>Servidor de Base de datos con el que hacer conexión</li>
 <li>Manejador de paquetes Composer</li>
 <li>*Opcional* Servidor Apache</li>
</ul>

Si se cumple con lo de arriba, una vez tengas clonado el repositorio ejecuta en la **_carpeta raíz del proyecto_**:

```
composer install
```
```
composer update
```

Para probar la aplicación se debe de ejecutar desde su directorio `./public` , bien con el comando `php -S direccion_host:puerto` dentro del directorio, o haciendo referencia a ella desde el archivo host en caso de utilizar **Apache**

El siguiente paso es crear una Base de Datos a la cual querramos hacer conexión, datos pertinentes a la configuración se encuentran en el archivo de variables de entorno `.env`

 ![imagen de ejemplo del archivo .env](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/0293799b-f16b-4bbb-b8ec-31236aab3ea2)

<ol>
 <li><strong>DSN</strong> escribe ahí el host, el puerto y la base de datos</li>
 <li><strong>DB_USER</strong> el usuario de la base de datos</li>
 <li><strong>DB_PASSWORD</strong> la contraseña que disponga tu base de datos</li>
</ol>

### Poner en marcha la base de datos

**_Existen dos opciones para poner en marcha la BBDD_**
<ol>
 <li>Migrations.php</li>
 <li>Importando el sql</li>
</ol>

**Migrations.php:** antes de entrar por la dirección URL o a la dirección creada por el comando `php -S` desde la **carpeta raíz** y una vez tengas puesto los datos de la Base de datos, escribe por consola el siguiente comando:

```dif
php Migrations.php
```

El cual debería insertar las tablas necesarias en tu Base de datos creada, mostrando el siguiente mensaje por consola.

![imagen ejemplo ejecución de comando php Migrations.php](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/8ec8b014-9f70-40dc-b4a7-1ed53d7b27e8)


![Base de datos creada](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/78649e14-c2f8-447d-8974-7c2bfc63191f)

 **Importando el sql**
 También puedes importar el sql de la Base de datos entera haciendo uso del **_sql proporcionado en el directorio_** `/database_sql`

 ![imagen de script sql](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/097755aa-0b33-4c7f-be39-c8b2ad7bcaba)

 
 ## Uso del Juego

A continuación se explica el uso de la aplicación, dispone de log y register y se puede controlar los usuarios desde la base de datos.
 
 ### Login y Register

Accediendo a la url `/register` y rellenando los campos correctos nos creará una cuenta de usuario, el formulario dispone de validación de errores.


![ejemplo campos erroneos](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/84b41af8-80ea-4647-839e-a6794f7a8c27)


![register completado](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/cc7c63a3-c715-48ab-8bcf-16cc392d1fee)

Si se ha creado con exito la cuenta te podrás loguear en `/login`
 
 ### Crear y Borrar Palabras y Categorías para el juego

 **Disponiendo de cuenta de usuario** en `/menuPalabras` y `/menuCategorias` podrás añadir palabras y categorías que quieras para que el juego disponga de más palabras a la hora de jugar.
 
 ### El juego
**Selecciona una categoría** y a jugar!, escribe en el input text para intentar rellenar y adivinar la palabra escogida por la aplicación, las letras se colorearán de <strong>verde</strong> si la letra está en esa misma posición, o <strong>amarillo</strong> si la palabra contiene esa letra!

![imagen de la partida](https://github.com/JuanIgnaso/Wordle-ES-Juego/assets/104755375/5dbb6847-454d-4d0b-9af7-b952f1f3dcf7)


Una vez terminada la partida puedes volver a intentarlo en `Jugar de nuevo`.
