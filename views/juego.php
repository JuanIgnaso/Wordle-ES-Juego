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

            <h2 style="text-align:center;" id="gameMessage">La categoría es: Nombre</h2>
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
        <h4 style="text-align:center;">Intentos: <strong id="numIntentos"></strong></h4>

        <!-- menu Configuración -->

        <!-- Tablero -->
        <div id="board">
            <!-- PALABRAS -->
            <div class="word" aria-label="Palabra"></div>
            <div class="word" aria-label="Palabra"></div>
            <div class="word" aria-label="Palabra"></div>
            <div class="word" aria-label="Palabra"></div>
            <div class="word" aria-label="Palabra"></div>
            <div class="word" aria-label="Palabra"></div>
        </div>

        <div class="separator" style="margin:Auto;"></div>

        <div id="gameActions">
            <label id="userInput">
                Escribe tu Palabra
                <input type="text" maxlength="8" name="enter_word" id="enter_word" class="enter_word">
            </label>
            <button type="button" onclick="reStartGame()" class="botonActions botonAdd" id="replay">Jugar de
                nuevo</button>
            <script>
                //FRONTEND DEL JUEGO//
                /*
                Parte del código es temporal
                */
                let wordToGuess = 'lunes';

                let input = document.getElementById('enter_word');
                let board = document.getElementById('board');
                let palabras = board.querySelectorAll('.word');
                input.setAttribute('maxlength', wordToGuess.length);

                let largo = input.getAttribute('maxlength');
                let words = document.getElementsByClassName('word');
                let intentosTexto = document.querySelector('#numIntentos');
                let message = document.querySelector('#gameMessage');
                let intentos = 1;
                let current = 0;

                intentosTexto.innerHTML = intentos;

                addWords(largo);//añadir todos los intentos pero mostrarlos ocultos.
                palabras[current].style.visibility = 'visible'; //mostrar la primera palabra.


                input.addEventListener('keyup', function (event) {
                    let last = palabras[current];//ultima palabra
                    let lastLetters = last.querySelectorAll('.letter');

                    //Crear una nueva palabra al presionar 'Enter'
                    if (event.key == 'Enter') {
                        //En el caso de estar en el último intento.
                        if (intentos == palabras.length) {
                            checkCurrentWord(lastLetters, wordToGuess) ? displayResult('Ganaste!') : displayResult('Perdiste!');
                        }
                        //Si el largo de lo que el usuario escribe es igual al largo de la palabra
                        if (input.value.length == largo && intentos < 6) {
                            //Pintar palabra
                            if (checkCurrentWord(lastLetters, wordToGuess)) {
                                displayResult('Ganaste!');
                            } else {
                                input.value = '';
                                intentos++;
                                current++;
                                intentosTexto.innerHTML = intentos;
                                palabras[current].style.visibility = 'visible';
                            }
                        }


                    } else {
                        //Aquí habría que printar lo que escribe el usuario
                        input.value = input.value.replace(/[^a-zA-Z]/i, '');
                        let letters = input.value.toUpperCase().split('');

                        updateCurrWord(lastLetters)
                        writeLetters(letters, lastLetters);
                    }
                });


                /*
                Muestra el resultado en la cabecera del board y muestra el botón para
                jugar otra vez.
                */
                function displayResult(message) {
                    document.querySelector('#gameMessage').innerHTML = message;
                    document.querySelector('#replay').style.display = 'block';
                    document.querySelector('#userInput').style.display = 'none';
                    input.setAttribute('disabled', 'true');
                }

                /*PARA QUE SE ACTUALICE LA VISTA CUANDO EL USUARIO ESCRIBA O BORRE UN CARACTER*/
                function updateCurrWord(word) {
                    word.forEach(element => {
                        element.innerHTML = '';
                        element.setAttribute('class', 'letter dissabled');
                    });
                }

                //Escribe las letras en la posición actual
                function writeLetters(letters, word) {
                    //Escribe las letras
                    for (let i = 0; i < letters.length; i++) {
                        word[i].innerHTML = letters[i];
                        word[i].setAttribute('class', 'letter enabled');
                    }
                }

                /**
                 * Comprueba la palabra y pinta las letras, letters siendo el array con las letras
                 * y word, la palabra a adivinar. 
                 * 
                 * @param letters 
                 * @param word
                 * @returns bool
                 */
                function checkCurrentWord(letters, word) {

                    let aciertos = 0;

                    for (let i = 0; i < letters.length; i++) {
                        //Si la letra está en la palabra
                        if (word.includes(letters[i].innerHTML.toLowerCase()) && word[i] != letters[i].innerHTML.toLowerCase()) {
                            letters[i].classList.toggle('inWord');
                        }

                        //Si la letra está en la misma posición
                        if (letters[i].innerHTML.toLowerCase() == word[i]) {
                            letters[i].classList.toggle('success');
                            aciertos++;
                        }
                    }

                    return aciertos == largo;
                }



                /**
                 * Añade las palabras al tablero 'board' con un largo en función de la palabra a adivinar.
                 */
                function addWords(largo) {
                    for (let i = 0; i < palabras.length; i++) {

                        let newWord = palabras[i];
                        newWord.style.gridTemplateColumns = "repeat(" + largo + ",5.25%)";
                        for (let j = 0; j < largo; j++) {
                            let letter = document.createElement('div');
                            letter.setAttribute('class', 'letter dissabled');
                            newWord.append(letter);
                        }
                    }
                }

                reStartGame = () => { location.reload(); };

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