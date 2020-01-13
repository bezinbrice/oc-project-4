<?php $titleSite = 'Billet simple pour l\'alaska'; ?>

<?php ob_start(); ?>
<div class="errorView--banner jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>BILLET SIMPLE POUR L'ALASKA</h2>
                        <h1 class="display-4">Une erreur est survenue !</h1>
                        <div class="errorView--text">
                            <p>Nous sommes désolés, il semble qu'une erreur se soit produite.</p>
                            <p>Plus d'infos : <?= $errorMessage ?></p>
                        </div>
                        <a href="index.php" class="btn btn-outline-info">Retour à la page d'accueil</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>