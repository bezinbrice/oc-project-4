<?php $titleSite = 'Page Admin'; ?>

<?php ob_start(); ?>
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
                <button type="submit" name="save" class="btn">Publier</button>
            <?php else: ?>
                <button type="submit" name="update" class="btn">Éditer</button>
                <button type="submit" name="delete" class="btn">Supprimer</button>
            <?php endif ?>
        </div>
    </form>
</div>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= $data['title'] ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= $data['content'] ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
        

        <button><a href="index.php?action=admin&amp;edit=<?= $data['id']; ?>"<strong>Modifier</strong></a> </button>

    </div>


<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

