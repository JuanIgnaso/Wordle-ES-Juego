<?php
/**
 * @var $this \juanignaso\phpmvc\View
 */

$this->title = 'Home';
?>
<header>
    <h1 id="tituloWeb">JUEGO WORDLE <i class="fa-regular fa-keyboard"></i></h1>
</header>
<main>
    <section id="desc-juego">
        <h2>Propósito del Juego</h2>
        <div class="separator"></div>
        <ol id="desc-contenido">
            <li>
                <p>El objetivo del juego es acertar la palabra seleccionada por el juego en un número máximo de
                    <strong>6
                        intentos</strong>
                </p>
            </li>
            <li>
                <p>Dependiendo de lo que escribas, cada una de las letras de la palabra se colorearán de un color:</p>
            </li>
            <li class="desc-element">
                <div class="letter_Example success">A</div><span>Si contiene la letra y <strong>está en esa
                        posición</strong></span>
            </li>
            <li class="desc-element">
                <div class="letter_Example in_word">A</div><span>Si contiene esa letra <strong>en algún lugar</strong>
                    de la
                    palabra</span>
            </li>
            <li class="desc-element">
                <div class="letter_Example">A</div><span>Si no se colorea quiere decir que la palabra <strong>no
                        contiene dicha letra</strong></span>
            </li>

        </ol>
        <div class="separator"></div>
    </section>
    <section id="acciones">
        <a href="" class="boton-iniciar-juego">Jugar</a>
        <ol id="loginRegister">
            <li><a href="">Login</a></li>
            <li>/</li>
            <li><a href="">Registrarse</a></li>
        </ol>
    </section>
</main>