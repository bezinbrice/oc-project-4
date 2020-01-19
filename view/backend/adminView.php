<?php $titleSite = 'Page Admin'; ?>
<?php ob_start(); ?>
<div class="admin-hero">
    <div class="container admin-hero--container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 title-white-shadow admin--top-title">Espace administrateur</h1>
                <p><a href="index.php?logout" class="text-monospace text-decoration-none admin--quit-page-link">Quitter la page d'administration</a></p>
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
                        <div class="input-group adminView--form--content updatePostView--form--content">
                            <textarea id="content" name="content"></textarea>
                        </div>
                        <div class="input-group adminView--publish-btn">
                            <button type="submit" name="save" class="btn btn-lg btn-primary">Publier</button>
                        </div>
                    </form>
                </div>
                    <div>
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
            <h2 class="admin--old-chapter">Derniers chapitres postés</h2>
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
                    <div class="card mb-4 xs-8 news">
                        <div class="card">
                            <h5 class="card-header"><?= $data['title'] ?></h5>
                            <div class="card-body">
                                <p class="card-text"><?= $data['sample'] ?></p><br>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary d-flex mb-2">Lire le chapitre &rarr;</a>
                                    <a href="index.php?action=admin&amp;edit=<?= $data['id']; ?>" class="btn btn-outline-info d-flex mb-2">Modifier</a>
                                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>#post-comment" class="btn btn-outline-secondary d-flex mb-2">Commentaires</a></em>
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
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="d-flex flex-row bd-highlight mb-3 bd-highlight adminView--btn-all-chapters">
            <a href="index.php?action=listPosts" class="btn btn-info btn-lg active" role="button" aria-pressed="true">VOIR TOUS LES CHAPITRES</a>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php ob_end_flush(); ?>

<?php require('view/frontend/template.php'); ?>

