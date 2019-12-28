<?php $title = htmlspecialchars($postUpdate['title']); ?>

<?php ob_start(); ?>
<h1>Modification de post!</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

    <div>
        <form action="index.php?action=admin" method="post">
            <input type="hidden" name="id" value="<?= $postUpdate['id']; ?>"/>
            <div class="input-group">
                <label for="title">Titre</label><br />
                <input type="text" id="title" name="title" value="<?= $postUpdate['title']; ?>" placeholder="Enter your title"/>
            </div>
            <div class="input-group">
                <label for="content">News</label><br />
                <textarea id="content" name="content"><?= $postUpdate['content']; ?></textarea>
            </div>
            <div class="input-group">
                <?php if($edit_state == false): ?>
                    <button type="submit" name="save" class="btn">Publier</button>
                <?php else: ?>
                    <button type="submit" name="update" class="btn">Éditer</button>
                <?php endif ?>
            </div>
        </form>
    </div>


<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
