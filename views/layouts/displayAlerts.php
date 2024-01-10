<?php
use juanignaso\phpmvc\Application;

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
        <span onclick="this.parentNode.style.display = 'none'" id="close">&times; </span>
        <span>
            <?php echo Application::$app->session->getFlash('error') ?>
        </span>
    </div>
    <?php
}
?>