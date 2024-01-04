<?php
/** @var mixed $this \juanignaso\phpmvc\View  */

$this->title = 'Iniciar Sesión';
?>
<h1 id="tituloWeb">Iniciar Sesión</h1>

<main class="main-login-register">

    <?php $form = juanignaso\phpmvc\form\Form::begin('', 'post'); ?>
    <div class="separator"></div>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'password')->passwordField(); ?>
    <input type="submit" value="Iniciar Sesión" class="boton">
    <?php juanignaso\phpmvc\form\Form::end(); ?>
</main>