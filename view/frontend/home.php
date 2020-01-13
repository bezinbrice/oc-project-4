<?php $titleSite = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>
<div id="background-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 display-3 title-white-shadow">BILLET SIMPLE POUR L'ALASKA</h1>
                <h2 class="title-white-shadow">Le nouveau best seller de Jean Forteroche directement en ligne</h2 class="">
                <img src="web/images/gilbert-garcin-photographe-sur-le-tard.jpg" class="img-fluid rounded mx-auto d-block image-home-hero" alt="portrait de Gilbert Garcin">
                <blockquote class="blockquote">
                    <p class="mb-0">Il n'est jamais trop tard pour changer.</p>
                    <footer class="blockquote-footer">Gilbert Garcin dans <cite title="Source Title">Le plus grand des hommes</cite> l'oeuvre précédente de Jean Forteroche</footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>
<div class="container home-page">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4 title-gray-shadow">Dernier chapitre paru</h2>
            <?php
            while ($data = $lastPost->fetch())
            {
                ?>
                <div class="card mb-4 news">
                    <div class="card">
                        <h5 class="card-header"><?= $data['title'] ?></h5>
                        <div class="card-body">
                            <p class="card-text"><?= $data['sample'] ?></p><br/>
                            <div  class="d-flex justify-content-between">
                                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire le chapitre &rarr;</a>
                                <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?> #post-comment" class="btn btn-outline-secondary" >Commentaires</a></em>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Posté le <?= $data['creation_date_fr'] ?>
                    </div>
                </div>
                <?php
            }
            $lastPost->closeCursor();
            ?>
            <div>
                <img src="web/images/les-amoureux-de-peros-guirec-gilbert-garcin.jpg" class="img-fluid rounded mx-auto d-block" alt="...">
            </div>
            <div class="card home--pitch-card">
                <h5 class="card-header text-uppercase">Tout commence ici</h5>
                <div class="card-body">
                    <h5 class="card-title">Gérard voulait voir la neige une dernière fois.</h5>
                    <p class="card-text text-justify">Gérard est un vieil homme usé par le temps. Chaque jour est constitué de moment près de son jardin, de son ami Pierre de l'autre côté de la rue et enfin des infos à la télévision. Lorsque Pierre décède, Gérard s'ennuie et n'entend aux infos que des nouvelles bien tristes sur le monde autour de lui. Il décide alors d'effectuer un dernier voyage, loin de chez lui. Pour avoir l'occasion de voir une dernière fois de la neige avant que celle-ci ne disparaisse pour toujours.</p>
                    <a href="index.php?action=listPosts" class="btn btn-primary">Visiter la page des chapitres</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
