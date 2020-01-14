<?php $titleSite = 'Gestion des commentaires'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Gestion des commentaires</h1>
            <a href="index.php?action=admin" class="btn btn-info">Retour à la page d'administration</a>
            <?php if(isset($_SESSION['msg'])): ?>
                <div id="message">
                    <?php
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                    ?>
                </div>
            <?php endif ?>
            <?php
            while ($reportComment = $getReportCom->fetch())
            {
            ?>
                <p><strong><?= htmlspecialchars($reportComment['author']) ?></strong> a posté le <?= $reportComment['comment_date_fr'] ?></p>
                <div>
                    <p><?= nl2br(htmlspecialchars($reportComment['comment'])) ?></p>
                    <p>Ce commentaire a été posté sur le chapitre : <?= $reportComment['title'] ?></p>
                    <form action="index.php?action=report&amp;comment_id=<?= $reportComment['comment_id'] ?>&amp;post_id=<?= $reportComment['id'] ?>" method="post">
                        <button type="submit" name="cancelReport" class="btn btn-success">Annuler le signalement</button>
                        <button type="submit" name="moderateComment" class="btn btn-warning">Modérer le commentaire</button>
                        <button type="submit" name="deleteComment" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            <?php
            }
            $getReportCom->closeCursor();
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
