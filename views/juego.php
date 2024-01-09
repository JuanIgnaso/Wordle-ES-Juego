<?php
use juanignaso\phpmvc\Application;

/**
 * @var $this \juanignaso\phpmvc\View
 */

$this->title = 'Partida';
?>
<h1 class="tituloPagina">Wordle - Partida <i class="fa-solid fa-gamepad"></i></h1>
<main>
    <section id="categoriaSeleccion">
        <h2 class="subtituloPagina">Selecciona una categoría <i class="fa-solid fa-layer-group"></i></h2>
        <p>Selecciona aquí una categoría de palabras para poder empezar a jugar! <strong>*</strong></p>
        <p>Una vez escogida una categoría, el juego decidirá que palabra debes de adivinar y podrás empezar la partida.
        </p>
        <p id="anotation"><strong>*</strong> Si no escoges una categoría se escogerá la que hay por
            defecto(Predeterminado).</p>
        <div class="custom-select" style="width:200px;">

            <select name="categoria" id="selectCategoria">
                <?php
                foreach ($categorias as $categoria) {
                    ?>
                    <option value="<?php echo $categoria['id']; ?>" <?php echo isset($model->categoria) && $model->categoria == $categoria['id'] ? 'selected' : ''; ?>>
                        <?php echo $categoria['nombre_categoria']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <script src="resources/js/customSelectScript.js"></script>

        </div>
        <button type="button" class="botonActions botonAdd" id="empezar">Empezar Juego</button>

    </section>
    <section id="mainGame">
        <h2 class="subtituloPagina">Juego</h2>
        <div id="board">
            <div class="letter success">A</div>
            <div class="letter">A</div>
            <div class="letter inWord">B</div>
            <div class="letter">C</div>
            <div class="letter">D</div>
            <div class="letter">E</div>
            <div class="letter">F</div>
            <div class="letter">G</div>
            <div class="letter">H</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>

            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>

            <div class="letter success">A</div>
            <div class="letter">A</div>
            <div class="letter inWord">B</div>
            <div class="letter">C</div>
            <div class="letter">D</div>
            <div class="letter">E</div>
            <div class="letter">F</div>
            <div class="letter">G</div>
            <div class="letter">H</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>

            <div class="letter success">A</div>
            <div class="letter">A</div>
            <div class="letter inWord">B</div>
            <div class="letter">C</div>
            <div class="letter">D</div>
            <div class="letter">E</div>
            <div class="letter">F</div>
            <div class="letter">G</div>
            <div class="letter">H</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>

            <div class="letter success">A</div>
            <div class="letter">A</div>
            <div class="letter inWord">B</div>
            <div class="letter">C</div>
            <div class="letter">D</div>
            <div class="letter">E</div>
            <div class="letter">F</div>
            <div class="letter">G</div>
            <div class="letter">H</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>

            <div class="letter success">A</div>
            <div class="letter">A</div>
            <div class="letter inWord">B</div>
            <div class="letter">C</div>
            <div class="letter">D</div>
            <div class="letter">E</div>
            <div class="letter">F</div>
            <div class="letter">G</div>
            <div class="letter">H</div>
            <div class="letter">A</div>
            <div class="letter success">W</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
            <div class="letter">A</div>
        </div>
    </section>
    <script>
        //Empezar juego
        let seleccionCategoria = document.querySelector('#categoriaSeleccion');
        let pantallaJuego = document.querySelector('#mainGame');
        let start = document.querySelector('#empezar');

        start.addEventListener('click', function () {
            seleccionCategoria.style.display = 'none';
            pantallaJuego.style.display = 'block';
        })
    </script>
</main>