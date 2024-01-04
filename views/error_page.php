<main id="errorMain">
    <h1 id="tituloError">Oh no!, Ha ocurrido un Error :( <i class="fa-solid fa-circle-exclamation"></i></h1>
    <h2 id="mensajeError">
        <?php echo "<span>Error " . $exception->getCode() . "</span> - " . $exception->getMessage(); ?>
    </h2>
</main>