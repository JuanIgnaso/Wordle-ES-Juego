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
    <button type="button" id="borrarCategoria" class="botonActions botonDelete">Borrar
        Categoría</button>
</div>
<script>
    /*
    Función para borrar la categoría especificada por el input text
    */

    document.getElementById('borrarCategoria').addEventListener('click', borrarCat);

    function borrarCat() {
        let data = document.querySelector('#nombre_categoria').value;

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
<?php Form::end(); ?>