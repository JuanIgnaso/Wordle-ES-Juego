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
        <p>Recomendable jugar al juego en <strong>Landscape <i class="fa-regular fa-images"></i></strong> si se juega en
            pantalla movil</p>
        </p>
        <p id="anotation"><strong>*</strong> Si no escoges una categoría se escogerá la que hay por
            defecto(Predeterminado).</p>

        <div class="custom-select" style="width:200px;">

            <select name="categoria" id="categoria">
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
        <p id="error_categoria"></p>
        <button type="button" class="botonActions botonAdd" id="empezar">Empezar Juego</button>
    </section>




    <section id="mainGame">
        <header>

            <h2 style="text-align:center;" id="gameMessage">La categoría es: <strong></strong></h2>
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
        <h4 style="text-align:center;">Intentos: <strong id="numIntentos"></strong> de <strong>6</strong></h4>

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
                /*SCRIPT QUE MANEJA EL FUNCIONAMIENTO DEL JUEGO***********************************************/
                /*VARIABLES----------------------------------------------------------------------------------*/
                let wordToGuess = ''; //Palabra que debe adivinar el usuario(por defecto vacía)
                let input = document.getElementById('enter_word');//input donde el usuario escribe la palabra.
                let palabras = document.querySelectorAll('#board .word'); //Array de palabras.
                let intentos = 1; //Intentos de la partida
                let current = 0;  //Posición del array que contiene las palabras
                /*-------------------------------------------------------------------------------------------*/

                //Botón para empezar la partida
                document.querySelector('#empezar').addEventListener('click', function () {
                    let option = document.querySelector('#categoria').value;//Valor seleccionado del select

                    /*Llamada por AJAX para escoger una palabra en función de la categoría seleccionda*/
                    $.ajax({
                        url: '/getPalabra',
                        type: 'POST',
                        data: {
                            categoria: option,
                        },
                        success: function (response) {
                            let resp = JSON.parse(response);
                            startGame(resp);
                        },
                        error: function (error) {
                            error = JSON.parse(error.responseText);
                            document.getElementById('error_categoria').innerHTML = error.error;
                        }
                    })
                });


                /**
                 * Empieza la partida para el usuario una vez seleccionada una categoría que dispone de palabras.
                 */
                function startGame(resp) {
                    wordToGuess = resp.palabra; //resp.palabra es la palabra que el usuario tiene que adivinar
                    document.querySelector('#gameMessage strong').innerHTML = resp.categoria;
                    input.setAttribute('maxlength', wordToGuess.length);
                    document.querySelector('#numIntentos').innerHTML = intentos;
                    document.querySelector('#categoriaSeleccion').style.display = 'none'; //Ocultar el menú de selección de categoría.
                    document.querySelector('#mainGame').style.display = 'block'; //Mostrar la pantalla del juego
                    addWords(wordToGuess.length);
                    palabras[current].style.visibility = 'visible'; //mostrar el largo de la palabra.
                }

                /**
                 * Añade las letras a cada una de las palabras, la cantidad varía en función del valor de la variable 'largo'
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


                /*Función asociada al input donde el usuario escribe cada intento*/
                input.addEventListener('keyup', function (event) {

                    let lastLetters = palabras[current].querySelectorAll('.letter'); //Letras de la última palabra o intento

                    //Crear una nueva palabra al presionar 'Enter '
                    if (event.key == 'Enter') {
                        //Último intento.
                        if (intentos == palabras.length) {
                            checkCurrentWord(lastLetters, wordToGuess) ? displayResult('Ganaste!') : displayResult(`Perdiste! la palabra era <strong>${wordToGuess}</strong>`);
                        }
                        //Si el largo de lo que el usuario escribe es igual al largo de la palabra
                        if (input.value.length == wordToGuess.length && intentos < 6) {
                            //Pintar palabra
                            if (checkCurrentWord(lastLetters, wordToGuess)) {
                                displayResult('Ganaste!');
                            } else {
                                //Si no acierta vacía el contenido del input y incrementa el número de intentos y posición actual
                                input.value = '';
                                intentos++;
                                current++;
                                document.querySelector('#numIntentos').innerHTML = intentos;
                                palabras[current].style.visibility = 'visible';
                            }
                        }
                    } else {
                        //Si no le da a 'Enter' escribe en la palabra actual las letras del input
                        input.value = input.value.replace(/[^a-zA-Z]/i, '');
                        let letters = input.value.toUpperCase().split('');

                        updateCurrWord(lastLetters)
                        writeLetters(letters, lastLetters);
                    }
                });


                /*
                Muestra el resultado en la cabecera del board y muestra el botón para
                jugar otra vez si el usuario gana o agota todos los intentos.
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

                    return aciertos == wordToGuess.length;
                }

                reStartGame = () => { location.reload(); };//Recarga la página para reiniciar el juego.
            </script>
        </div>
    </section>


</main>