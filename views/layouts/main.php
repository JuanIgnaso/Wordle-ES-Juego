<!DOCTYPE html>
<html lang="en">
<?php use juanignaso\phpmvc\Application;

; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/styles.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="./resources/icons/fontawesome/css/all.css">
    <!-- AQUÍ TÍTULO DE LA PÁGINA -->
    <title>
        <?php echo $this->title;
        ?>
    </title>
</head>

<body>
    <?php
    if (!Application::isGuest()) {
        ?>
        <span id="username">
            <?php echo Application::$app->user->getUserName(); ?> <a href="/logout"><i
                    class="fa-solid fa-right-from-bracket"></i></a>
        </span>
        <?php
    }
    ?>
    <!-- CONTENEDOR DONDE SE CARGA EL CONTENIDO -->
    <div class="container">
        <?php
        if (Application::$app->session->getFlash('success')) {
            ?>
            <div class="alert success">
                <span>
                    <?php echo Application::$app->session->getFlash('success') ?>
                </span>
            </div>
            <?php
        }
        ?>

        {{content}}
    </div>
    <?php
    include 'footer.php';
    ?>