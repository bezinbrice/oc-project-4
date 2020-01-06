<?php $titleSite = $post['title']; ?>

<?php ob_start(); ?>
<h1>Le blog de JeanJean avec des commentaires !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h5>
        <?= $post['title'] ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h5>

    <p>
        <?= nl2br($post['content'])?>
    </p>
</div>

<h2 id="post-comment">Commentaires</h2>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" value="Poster"/>
        </div>
    </form>

<?php
while ($comment = $comments->fetch())
    {
    ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <div>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <form action="index.php?action=report&amp;comment_id=<?= $comment['id'] ?>&amp;post_id=<?= $post['id'] ?>" method="post">
            <?php if ($comment['report'] == 0): ?> <!-- On vérifie si le commentaire a été signalé -->
                <button type="submit" name="report" class="btn btn-danger">Signaler</button>
            <?php elseif (isset($_SESSION['admin'])): ?>
                <button type="submit" name="deleteComment" class="btn btn-danger">Supprimer</button>
            <?php else: ?>
            <p>Ce commentaire a été signalé</p>
        </form>
        <?php endif ?>
    </div>
    <?php
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
