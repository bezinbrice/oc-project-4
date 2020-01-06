<?php $titleSite = 'Le blog de Jean'; ?>
<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Le blog de JeanJean !</h1>
            <h2 class="my-4">Derniers billets du blog</h2>
<?php
while ($data = $posts->fetch())
{
?>
    <div class="card mb-4 news">
        <div class="card">
            <h5 class="card-header"><?= $data['title'] ?></h5>
            <div class="card-body">
                <p class="card-text"><?= $data['content'] ?></p>
                <div  class="d-flex justify-content-between">
                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire le chapitre &rarr;</a>
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?> #post-comment" >Commentaires</a></em>
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
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Derniers parus</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Anciens chapitres &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
