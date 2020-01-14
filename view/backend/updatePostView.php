<?php $titleSite = 'Modification'; ?>
<?php ob_start(); ?>
<div class="updatePostView--banner jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 updatePostView--title">MODIFICATION</h1>
                <a href="index.php?action=admin" class="btn btn-info">Retour à la page d'administration</a>
                <div class="updatePostView--form">
                    <form action="index.php?action=admin&amp;edit=<?= $postUpdate['id']; ?>" method="post">
                        <input type="hidden" name="id" value="<?= $postUpdate['id']; ?>"/>
                        <div class="input-group">
                            <input type="text" id="title" name="title" value="<?= htmlspecialchars($postUpdate['title']); ?>" placeholder="Enter your title"/>
                        </div>
                        <div class="input-group updatePostView--form--content">
                            <textarea id="content" name="content" class="updatePostView--form--content"><?= nl2br(htmlspecialchars($postUpdate['content'])); ?></textarea>
                        </div>
                        <div class="input-group updatePostView--form--btns">
                            <button type="submit" name="update" class="btn btn-warning updatePostView--form--btns--edit" onclick="return confirm('Êtes-vous sûr de vouloir modifier le chapitre?')">Éditer</button>
                            <button type="submit" name="delete" class="btn btn-danger updatePostView--form--btns--delete" onclick="return confirm('Êtes-vous sûr de vouloir effacer le chapitre?')">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
