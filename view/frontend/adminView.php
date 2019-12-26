<?php $titleSite = 'Mon blog'; ?>
<?php
$edit_state = false;
$id = 0;
$title="";
$content="";
?>

<?php ob_start(); ?>
<h1>Le blog de JeanJean !</h1>
<p>Espace administrateur</p>

<?php if(isset($_SESSION['msg'])): ?>
    <div id="message">
        <?php
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        ?>
    </div>
<?php endif ?>
<?php
require_once('model/AdminPostManager.php');
$adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_state = true;
    $post = $adminPostManager->getPostToUpdate($id);
}
else{
    $post['id'] = "";
    $post['title'] = "";
    $post['content'] = "";
}
?>
<div>
    <form action="index.php?action=admin" method="post">
        <input type="hidden" name="id" value="<?= $post['id']; ?>"/>
        <div class="input-group">
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" value="<?= $post['title']; ?>" placeholder="Enter your title"/>
        </div>
        <div class="input-group">
            <label for="content">News</label><br />
            <textarea id="content" name="content"><?= $post['content']; ?></textarea>
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
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= $data['content'] ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>

        <button><a href="index.php?action=admin&amp;edit=<?= $data['id']; ?>"<strong>Modifier</strong></button>

    </div>


<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
