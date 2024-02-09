<?php
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\form\Form;

/**
 * @var $this \juanignaso\phpmvc\View
 */

$this->title = 'Menú Palabras';
?>
<ol class="confMenu">
    <li><span>Palabras</span></li>
    <li>/</li>
    <li><a href="/menuCategorias">Categorías</a></li>
</ol>
<h1 class="tituloPagina">Menú de Palabras</h1>
<main>
    <?php $form = Form::begin('', 'post'); ?>
    <div class="actions">
        <div class="custom-select" style="width:200px;">
            <select name="categoria" id="categoria">
                <option value="">Selecciona Una</option>
                <?php
                foreach ($categorias as $categoria) {
                    ?>
                    <option value="<?php echo $categoria['value']; ?>" <?php echo isset($model->categoria) && $model->categoria == $categoria['value'] ? 'selected' : ''; ?>>
                        <?php echo $categoria['name']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>

        </div>
        <p class="input_error">
            <?php if (isset($errors['categoria'])) {
                echo ($errors['categoria'][0]);
            } ?>
        </p>
        <!-- script custom select -->
        <script src="resources/js/customSelectScript.js"></script>

        <?php echo $form->field($model, 'palabra'); ?>
        <button type="submit" class="botonActions botonAdd">Añadir Palabra</button>
    </div>
    <?php Form::end(); ?>


    <section class="registrosContainer">
        <div class="separator"></div>
        <table class="dataTable">
            <caption>Palabras Actuales
                <strong>
                    <?php echo count($palabras); ?>
                </strong>
            </caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Palabra</th>
                    <th>Categoria</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($palabras as $palabra) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $palabra['id']; ?>
                        </td>
                        <td>
                            <?php echo $palabra['palabra']; ?>
                        </td>
                        <td>
                            <?php echo $palabra['nombre_categoria']; ?>
                        </td>
                        <td class="action">
                            <i class="fa-regular fa-square-minus actionBorrar"
                                onclick="borrarElemento( '<?php echo $palabra['palabra']; ?>','<?php echo $palabra['categoria']; ?>','/borrarPalabra')"
                                aria-label="Borrar"></i>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <script src="resources/js/dist/fancyTable.min.js"></script>
        <script src="resources/js/shortDataTable.js"></script>
        <script>
            /*
            Función para borrar la categoría especificada por el input text
            */
            function borrarElemento(palabra, categoria, url) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        palabra: palabra,
                        categoria: categoria,
                    },
                    success: function (response) {
                        location.reload();
                        console.log('Elemento borrado');
                    }, error: function (error) {
                        location.reload();
                        console.log('error');
                    },
                });
            }
        </script>
        <div class="separator" style="margin-bottom: 2em;"></div>
    </section>
</main>