<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>

    <h3>Une erreur est survenue !</h3>

    <p>Nous sommes désolés, il semble qu'une erreur se soit produite.</p>

    <p>Erreur : <?= $errorMessage ?></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>