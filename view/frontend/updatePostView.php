<?php $title = $postUpdate['title']; ?>

<?php ob_start(); ?>
<h1>Modification de post!</h1>
<p><a href="index.php?action=admin">Retour à la page d'administration</a></p>

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
                    <button type="submit" name="update" class="btn btn-warning">Éditer</button>
                    <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
            </div>
        </form>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
