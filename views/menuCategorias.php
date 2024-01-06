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
<?php echo $form->field($model, 'nombre_categoria'); ?>
<button type="submit" class="botonActions">Crear Categoría</button>
<?php Form::end(); ?>