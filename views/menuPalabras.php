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
        <select id="select_categoria" name="categoria" id="categoria">
            <?php
            foreach ($categorias as $categoria) {
                ?>
                <option value="<?php echo $categoria['id']; ?>">
                    <?php echo $categoria['nombre_categoria']; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <?php echo $form->field($model, 'palabra'); ?>
        <button type="submit" class="botonActions botonAdd">Añadir Palabra</button>
    </div>

    <?php Form::end(); ?>
    <section class="registrosContainer">
        <div class="separator"></div>
        <table class="dataTable">
            <caption>Palabras Actuales</caption>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Palabra</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acción</th>
            </tr>
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
                        <i class="fa-regular fa-square-minus actionBorrar" aria-label="Borrar"></i>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="separator" style="margin-bottom: 2em;"></div>
    </section>
</main>