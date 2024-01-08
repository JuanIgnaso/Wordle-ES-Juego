<?php
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\form\Form;

/**
 * @var $this \juanignaso\phpmvc\View
 */

$this->title = 'Menú Categorías';
?>

<h1 class="tituloPagina">Menú de Categorías <i class="fa-solid fa-layer-group"></i></h1>
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
        <caption>Categorías actuales</caption>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre Categoría</th>
            <th scope="col">Acción</th>
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
                            onclick="borrarCat( '<?php echo $categoria['nombre_categoria']; ?>')" aria-label="Borrar"></i></td>
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
        function borrarCat(data) {
            $.ajax({
                url: '/borrarCategoria',
                type: 'POST',
                data: {
                    nombre_categoria: data
                },
                success: function (response) {
                    location.reload();
                    console.log('Categoría borrada');
                }, error: function (error) {
                    location.reload();
                    document.querySelector('#nombre_categoria').value = data;
                    console.log('error');
                },
            });
        }
    </script>

    <div class="separator" style="margin-bottom: 2em;"></div>

</section>