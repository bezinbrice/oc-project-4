<?php $titleSite = 'Billet pour l\'Alaska - Chapitres'; ?>
<?php ob_start(); ?>
<div class="banner-listPostsView jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="my-4 banner-listPostsView--text">TOUS LES CHAPITRES DEJA PARUS</h1>
            <h2 class="my-4 banner-listPostsView--text">BILLET SIMPLE POUR L'ALASKA</h2>
            <blockquote class="blockquote banner-listPostsView--text banner-listPostsView--blockquote">
                <p class="mb-0">Quand il a fallu se battre, les gens ont préféré faire ceux qui n'avaient pas compris.</p>
                <footer class="blockquote-footer banner-listPostsView--text banner-listPostsView--blockquote">Marc Boulland dans <cite title="Source Title">Notre responsabilité</cite> un ouvrage de Jean Forteroche</footer>
            </blockquote>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            while ($data = $posts->fetch())
            {
            ?>
            <div class="card mb-4 news">
                <div class="card">
                    <h5 class="card-header"><?= $data['title'] ?></h5>
                    <div class="card-body">
                        <p class="card-text"><?= $data['content'] ?></p>
                        <div  class="d-flex justify-content-between flex-wrap">
                            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-info d-flex bd-highlight mb-2">Lire le chapitre &rarr;</a>
                            <?php if(isset($_SESSION['admin'])): ?>
                            <a href="index.php?action=admin&amp;edit=<?= $data['id']; ?>" class="btn btn-info d-flex bd-highlight mb-2">Modifier</a>
                            <?php endif ?>
                            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?> #post-comment" class="btn btn-outline-secondary d-flex bd-highlight mb-2">Commentaires</a></em>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Posté le <?= $data['creation_date_fr'] ?>
                    </div>
                </div>
            </div>
            <?php
            }
            $posts->closeCursor();
            ?>
             <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center mb-4">
                      <?php if($actualPage > 1):?>
                      <li class="page-item"><a class="page-link" href="index.php?action=listPosts&page=<?=$actualPage-1?>">&larr; Derniers parus</a></li>
                      <?php elseif($actualPage == 1): ?>
                      <li class="page-item disabled"><a class="page-link" href="index.php?action=listPosts&page=1">&larr; Derniers parus</a></li>
                      <?php endif ?>
                    <?php
                    //Affichage des pages
                    for ($i=1; $i <= $nb_page ; $i++)
                    { ?>
                        <li class="page-item"><a class="page-link" href="index.php?action=listPosts&page=<?=$i?>"><?=$i?></a></li>
                   <?php
                    }
                    ?>
                      <?php if($actualPage < $nb_page):?>
                      <li class="page-item"><a class="page-link" href="index.php?action=listPosts&page=<?=$actualPage+1?>">Anciens chapitres &rarr;</a></li>
                      <?php elseif($actualPage == $nb_page): ?>
                      <li class="page-item disabled"><a class="page-link" href="index.php?action=listPosts&page=<?=$nb_page?>">Anciens chapitres &rarr;</a></li>
                      <?php endif ?>
                  </ul>
             </nav>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
