<?php $titleSite = 'Page Admin'; ?>

<?php ob_start(); ?>
<div class="admin-hero">
    <div class="container admin-hero--container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 title-white-shadow">Espace administrateur</h1>
                <p><a href="index.php" class="text-monospace text-decoration-none admin--quit-page-link">Quitter la page d'administration</a></p>
                <?php if(isset($_SESSION['msg'])): ?>
                    <div id="message">
                        <?php
                        echo $_SESSION['msg'];
                        unset ($_SESSION['msg']);
                        ?>
                    </div>
                <?php endif ?>
                <div>
                    <form action="index.php?action=admin" method="post">
                        <div class="input-group">
                            <input type="text" id="title" name="title" placeholder="Titre du chapitre"/>
                        </div>
                        <div class="input-group">
                            <textarea id="content" name="content"></textarea>
                        </div>
                        <div class="input-group">
                            <button type="submit" name="save" class="btn btn-primary">Publier</button>
                        </div>
                    </form>
                </div>
                    <div >
                        <?php if ($nbReport['nbreports'] > 0): ?>
                        <a href="index.php?action=reports" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Commentaires Signalés <span class="badge badge-light"><?=$nbReport['nbreports']?></span></a> <!-- Nous permet d'obtenir le nombre de commentaires signalés-->
                        <?php else: ?>
                        <a href="index.php?action=reports" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Aucune notification <span class="badge badge-light"><?=$nbReport['nbreports']?></span></a>
                        <?php endif ?>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="admin--old-chapter">Anciens chapitres parus</h2>
        </div>
    </div>
</div>
<?php
while ($data = $posts->fetch())
{
?>
<div class="admin-posts">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news">
                    <div class="card mb-4 news">
                        <div class="card">
                            <h5 class="card-header"><?= $data['title'] ?></h5>
                            <div class="card-body">
                                <p class="card-text"><?= $data['sample'] ?></p><br>
                                <div class="d-flex justify-content-between">
                                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire le chapitre &rarr;</a>
                                    <button type="button" class="btn btn-outline-info"><a href="index.php?action=admin&amp;edit=<?= $data['id']; ?>"<strong>Modifier</strong></a> </button>
                                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?> #post-comment" >Commentaires</a></em>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                Posté le <?= $data['creation_date_fr'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
$posts->closeCursor();
?>
<div>
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item disabled">
            <a class="page-link" href="#">&larr; Derniers parus</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">Anciens chapitres &rarr;</a>
        </li>
    </ul>
</div>
<?php $content = ob_get_clean(); ?>
<?php ob_end_flush(); ?>

<?php require('template.php'); ?>

