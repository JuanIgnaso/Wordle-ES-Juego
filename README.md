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

Disponer de Docker o Docker Desktop instalado en el equipo.

### Como poner en marcha

Clona el repositorio en tu carpeta de preferencia y dentro de la carpeta raíz del proyecto ejecuta el siguiente comando:

```
docker compose up -d
```
Si la app te da error de que no tiene composer instalado, ejecuta el siguiente comando a continuación dentro de la carpeta raíz:

```
docker compose exec app composer install
```


 
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
