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

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
                    class="fa-solid fa-right-from-bracket"></i></a> / <a href="/">Inicio</a>
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
                <span onclick="this.parentNode.style.display = 'none'" id="close">&times; </span>
                <span>
                    <?php echo Application::$app->session->getFlash('success') ?>
                </span>
            </div>
            <?php
        }
        ?>

        <?php
        if (Application::$app->session->getFlash('error')) {
            ?>
            <div class="alert error">
                <span>
                    <?php echo Application::$app->session->getFlash('error') ?>
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