<?php $titleSite = 'Page Admin'; ?>

<?php ob_start(); ?>
<div class="admin-hero">
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>Le blog de JeanJean !</h1>
                <p>Espace administrateur</p>
                <p><a href="index.php" >Quitter la page d'administration</a></p>
                <?php if(isset($_SESSION['msg'])): ?>
                    <div id="message">
                        <?php
                        echo $_SESSION['msg'];
                        unset ($_SESSION['msg']);
                        ?>
                    </div>
                <?php endif ?>
                <div>
                    <form action="index.php?action=admin&amp;edit=<?= $postUpdate['id']; ?>" method="post">
                        <input type="hidden" name="id" value="<?= $postUpdate['id']; ?>"/>
                        <div class="input-group">
                            <label for="title">Titre</label><br />
                            <input type="text" id="title" name="title" value="<?= htmlspecialchars($postUpdate['title']); ?>" placeholder="Enter your title"/>
                        </div>
                        <div class="input-group">
                            <label for="content">News</label><br />
                            <textarea id="content" name="content"><?= nl2br(htmlspecialchars($postUpdate['content'])); ?></textarea>
                        </div>
                        <div class="input-group">
                            <?php if($postUpdate['id'] == 0): //On vérifie si l'on est dans l'update (donc si la news a un id) ?>
                                <button type="submit" name="save" class="btn btn-primary">Publier</button>
                            <?php else: ?>
                                <button type="submit" name="update" class="btn btn-warning">Éditer</button>
                                <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
                            <?php endif ?>
                        </div>
                    </form>
                </div>
               <!-- <button type="button" class="btn btn-primary">  Bouton pour afficher les commentaires signalés
                    Profile <span class="badge badge-light">9</span>
                    <span class="sr-only">unread messages</span>
                </button> -->
            </div>
        </div>
    </div>
</div>

<?php
while ($data = $posts->fetch())
{
?>
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-12">
            <div class="news">
                <h5>
                    <?= $data['id'] ?>
                    <?= $data['title'] ?>
                </h5>
                <p>
                    <?= $data['content']; ?>
                    <br />
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                </p>
                <?php

       /** while ($comment = $comments->fetch())
        {
            ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <?php
        } */
        ?>

                <button><a href="index.php?action=admin&amp;edit=<?= $data['id']; ?>"<strong>Modifier</strong></a> </button>
            </div>
        </div>
    </div>
</div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

