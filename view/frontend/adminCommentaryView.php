<?php $titleSite = 'Gestion des commentaires'; ?>

<?php ob_start(); ?>
<h1>Gestion des commentaires</h1>
<p><a href="index.php?action=admin">Retour à la page d'administration</a></p>
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
            <button type="submit" name="deleteComment" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
