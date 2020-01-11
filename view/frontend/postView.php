<?php $titleSite = $post['title']; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="postView--link-return">
                <a href="index.php?action=listPosts" class="btn btn-outline-secondary postView--link-return--btn">Retour à la liste des billets</a>
            </div>
            <div class="news">
                <h1 class="display-4"><?= $post['title'] ?></h1>
                <h5><em>le <?= $post['creation_date_fr'] ?></em></h5>
                <p>
                    <?= nl2br($post['content'])?>
                </p>
            </div>
            <h2 id="post-comment">Commentaires</h2>
            <div class="col-md-4 postView--form-comment">
                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="author">Auteur</label><br />
                        <input type="text" id="author" name="author" />
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire</label><br />
                        <textarea class="form-control" id="comment" name="comment"></textarea>
                    </div>
                    <div>
                        <input class="btn btn-outline-dark" type="submit" value="Poster"/>
                    </div>
                </form>
            </div>

            <?php
            while ($comment = $comments->fetch())
                {
                ?>
                <div class="postView--comment-msg">
                    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                    <div>
                        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                        <?php if ($comment['comment'] == "Ce message a été modéré par l'administrateur du site"): ?>
                            <p></p>
                        <?php elseif ($comment['report'] == 0): ?> <!-- On vérifie si le commentaire a été signalé -->
                        <form action="index.php?action=report&amp;comment_id=<?= $comment['comment_id'] ?>&amp;post_id=<?= $post['id'] ?>" method="post">
                            <button type="submit" name="report" class="btn btn-outline-danger">Signaler</button>
                        </form>
                        <?php else: ?>
                        <p><em>Ce commentaire a été signalé</em></p>
                        <?php endif ?>
                    </div>
                </div>
                <?php
                }
                $comments->closeCursor();
                ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
