<?php
use juanignaso\phpmvc\form\PasswordField;

/** @var mixed $this \juanignaso\phpmvc\View  */

$this->title = 'Iniciar Sesión';
?>
<h1 class="tituloPagina">Iniciar Sesión <i class="fa-solid fa-right-to-bracket"></i></h1>

<main class="main-login-register">

    <?php $form = juanignaso\phpmvc\form\Form::begin('', 'post'); ?>
    <div class="separator"></div>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo new PasswordField($model, 'password'); ?>
    <input type="submit" value="Iniciar Sesión" class="boton">
    <?php juanignaso\phpmvc\form\Form::end(); ?>
    <a href="/" style="color:white; margin-top:0.5em;">Volver a Inicio</a>
</main>
<script src="resources/js/hiddeShowPass.js"></script>