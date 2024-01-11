<?php
use juanignaso\phpmvc\Application;

/**
 * @var $this \juanignaso\phpmvc\View
 */

$this->title = 'Juego';
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
        <header>

            <h2>La categoría es: Nombre</h3>
                <div class="dropdown">
                    <button type="button" class="gameConf" aria-label="Menú configuración">
                        <i class="fa-solid fa-gears"></i>
                    </button>
                    <div class="confContent">
                        <ol>
                            <li>Menú Configuración</li>
                            <li><a href="/menuPalabras" aria-label="Ir a menu palabras">Palabras</a></li>
                            <li><a href="/menuCategorias" aria-label="Ir a menu categorías">Categorías</a></li>
                        </ol>
                    </div>
                </div>
        </header>

        <!-- menu Configuración -->

        <div id="board">


            <!-- <div class="word">
                <div class="letter dissabled"></div>
                <div class="letter dissabled"></div>
                <div class="letter dissabled"></div>
                <div class="letter dissabled"></div>
                <div class="letter dissabled"></div>
                <div class="letter dissabled"></div>
                <div class="letter enabled">G</div>
                <div class="letter enabled">H</div>
                <div class="letter enabled">A</div>
                <div class="letter enabled">A</div>
                <div class="letter enabled">A</div>
                <div class="letter enabled">A</div>
                <div class="letter enabled">A</div>
                <div class="letter enabled">A</div>
            </div> -->
        </div>

        <div class="separator" style="margin:Auto;"></div>

        <div>
            <label id="userInput">
                Escribe tu Palabra
                <input type="text" maxlength="8" name="enter_word" id="enter_word" class="enter_word">
            </label>
            <script>
                let wordToGuess = 'pesetas';

                let palabras;
                let input = document.getElementById('enter_word');
                let board = document.getElementById('board');
                input.setAttribute('maxlength', wordToGuess.length);

                let largo = input.getAttribute('maxlength');
                let words = document.getElementsByClassName('word');
                let intentos = 1;


                addWord(largo);


                input.addEventListener('keyup', function (event) {
                    palabras = board.querySelectorAll('.word');
                    let last = palabras[palabras.length - 1];//ultima palabra
                    let lastLetters = last.querySelectorAll('.letter');

                    //Crear una nueva palabra al presionar 'Enter'
                    if (event.key == 'Enter') {
                        //Si el largo de lo que el usuario escribe es igual al largo de la palabra
                        if (input.value.length == largo && intentos != 6) {
                            //Pintar palabra
                            checkCurrentWord(lastLetters, wordToGuess);
                            addWord(largo);
                            input.value = '';
                            intentos++;
                        }
                    } else {
                        //Aquí habría que printar lo que escribe el usuario
                        let letters = input.value.toUpperCase().split('');


                        lastLetters.forEach(element => {
                            element.innerHTML = '';
                            element.setAttribute('class', 'letter dissabled');
                        });

                        //Escribe las letras
                        for (let i = 0; i < letters.length; i++) {
                            lastLetters[i].innerHTML = letters[i];
                            lastLetters[i].setAttribute('class', 'letter enabled');
                        }

                    }
                });

                /**
                 * Comprueba la palabra y pinta las letras, letters siendo el array con las letras
                 * y word, la palabra a adivinar. 
                 * 
                 * @param letters 
                 * @param word
                 */
                function checkCurrentWord(letters, word) {
                    for (let i = 0; i < letters.length; i++) {

                        // //Si la letra está en la palabra
                        if (word.includes(letters[i].innerHTML.toLowerCase()) && word[i] != letters[i].innerHTML.toLowerCase()) {
                            letters[i].classList.toggle('inWord');
                        }

                        //Si la letra está en la misma posición
                        if (letters[i].innerHTML.toLowerCase() == word[i]) {
                            letters[i].classList.toggle('success');
                        }

                    }
                }

                /**
                 * Añade una palabra al tablero
                 */
                function addWord(largo) {

                    let newWord = document.createElement('div');
                    newWord.setAttribute('class', 'word');
                    newWord.style.gridTemplateColumns = "repeat(" + largo + ",5.25%)";
                    for (let i = 0; i < largo; i++) {
                        let letter = document.createElement('div');
                        letter.setAttribute('class', 'letter dissabled');
                        newWord.append(letter);
                    }
                    board.append(newWord);
                }
            </script>
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