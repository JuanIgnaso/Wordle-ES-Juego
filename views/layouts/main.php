<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/styles.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="./resources/icons/fontawesome/css/all.css">
    <!-- AQUÍ TÍTULO DE LA PÁGINA -->
    <title>
        <?php echo $this->title; ?>
    </title>
</head>

<body>
    <!-- CONTENEDOR DONDE SE CARGA EL CONTENIDO -->
    <div class="container">
        {{content}}
    </div>
    <?php
    include 'footer.php';
    ?>