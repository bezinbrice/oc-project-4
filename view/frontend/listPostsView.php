<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Le blog de JeanJean !</h1>
<p>Derniers billets du blog :</p>
<form action="index.php?action=admin" method="post">
    <p>
        <input type="password" name="password" />
        <input type="submit" value="Admin" />
    </p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
