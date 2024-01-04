<?php
/** @var mixed $this \juanignaso\phpmvc\View  */

$this->title = 'Registrar Usuario';
?>
<h1 id="tituloWeb">Registrar nuevo usuario</h1>

<main class="main-login-register">
    <?php $form = juanignaso\phpmvc\form\Form::begin('', 'post'); ?>
    <?php echo $form->field($model, 'nombre'); ?>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'password')->passwordField(); ?>
    <?php echo $form->field($model, 'passwordConfirm')->passwordField(); ?>
    <input type="submit" value="Registrarse" class="boton">
    <?php juanignaso\phpmvc\form\Form::end(); ?>
</main>