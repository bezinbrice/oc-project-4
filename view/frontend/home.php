<?php $titleSite = 'Le blog de Jean'; ?>
<?php  unset ($_SESSION['admin']);?>
<?php ob_start(); ?>
<div id="background-home" alt="background hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4">Le blog de JeanJean !</h1>
                <h2>"Il n'est jamais trop tard pour changer"</h2>
                <h2>Le nouveau best seller de Jean Forteroche directement en ligne</h2>
            </div>
        </div>
    </div>
</div>
<div class="container home-page">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-12">
            <h2 class="my-4">Dernier chapitre paru</h2>
            <?php
            while ($data = $lastPost->fetch())
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
                    </div>
                    <div class="card-footer text-muted">
                        Posté le <?= $data['creation_date_fr'] ?>
                    </div>
                </div>
                <?php
            }
            $lastPost->closeCursor();
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
