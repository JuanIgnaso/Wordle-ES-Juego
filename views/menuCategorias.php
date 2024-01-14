<?php
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\form\Form;

/**
 * @var $this \juanignaso\phpmvc\View
 */

$this->title = 'Menú Categorías';
?>
<ol class="confMenu">
    <li><a href="/menuPalabras">Palabras</a></li>
    <li>/</li>
    <li><span>Categorías</span></li>
</ol>
<h1 class="tituloPagina">Menú de Categorías <i class="fa-solid fa-layer-group"></i> </h1>
<?php $form = Form::begin('', 'post'); ?>
<div class="actions">
    <?php echo $form->field($model, 'nombre_categoria'); ?>
    <button type="submit" class="botonActions botonAdd">Crear Categoría</button>
    <!-- <button type="button" onclick="borrarCat(document.querySelector('#nombre_categoria').value)" id="borrarCategoria"
        class="botonActions botonDelete">Borrar
        Categoría</button> -->
</div>

<?php Form::end(); ?>

<section class="registrosContainer">
    <div class="separator"></div>

    <table class=" dataTable">
        <caption>Categorías actuales <strong>
                <?php echo count($categorias); ?>
            </strong></caption>
        <tr>
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Nombre Categoría</th>
                <th scope="col">Acción</th>
            </thead>
        </tr>
        <?php
        foreach ($categorias as $categoria) {
            if ($categoria['id'] != 1) {
                ?>
                <tr>
                    <td>
                        <?php echo $categoria['id']; ?>
                    </td>
                    <td>
                        <?php echo $categoria['nombre_categoria']; ?>
                    </td>
                    <td class="action"><i class="fa-regular fa-square-minus actionBorrar"
                            onclick="borrarElemento( '<?php echo $categoria['nombre_categoria']; ?>','/borrarCategoria')"
                            aria-label="Borrar"></i></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>

    <script>
        /*
        Función para borrar la categoría especificada por el input text
        */
        function borrarElemento(data, url) {

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    nombre_categoria: data
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