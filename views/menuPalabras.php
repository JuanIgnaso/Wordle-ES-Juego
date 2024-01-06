<?php
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\form\Form;

/**
 * @var $this \juanignaso\phpmvc\View
 */

$this->title = 'Menú Palabras';
?>

<h1 class="tituloPagina">Menú de Palabras</h1>
<main>
    <?php $form = Form::begin('', 'post'); ?>
    <div class="actions">
        <select name="" id="">
            <option value="1">
                <?php echo $categorias; ?>
            </option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <div class="form_group">
            <label><strong>Palabra</strong></label>
            <input type="" id="" name="" value="" class="">
            <p class="input_error"></p>
        </div>
        <button type="submit" class="botonActions success">Añadir</button><button type="button"
            class="botonActions error">Borrar</button>

    </div>


    <?php Form::end(); ?>
</main>