<?php $titleSite = 'Le blog de Jean'; ?>
<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4 title-white-shadow">Le blog de JeanJean !</h1>
            <h2 class="my-4 title-white-shadow">Derniers billets du blog</h2>
           <?php
            /**
            $nb_posts_page= 5; // nombre de billet par page
            $db = new \PDO('mysql:host=localhost:3308;dbname=oc4;charset=utf8', 'root', 'root');
            // on recupere le nombre de billet
            $req=$db->query('SELECT COUNT(*) AS nb_posts FROM posts');
            $donnees=$req->fetch();
            $nb_posts= $donnees['nb_posts'];

          $nb_page= ceil($nb_posts/$nb_posts_page);//calcul du nombre de page
            if (isset ($_GET['page'])) // si la variable $_GET['page'] existe , donc si on a cliqué sur un n° de page...
            {
                $actualPage=intval($_GET['page']); // cela veut dire que nous sommes sur la page actuelle

                if ($actualPage>=$nb_page) // *****Si la valeur de $pageActuelle (le numéro de la page) est plus grande ou égale à $nombreDePage...
                    {
                    $actualPage=$nb_page;
                    }
                }
            else // sinon-> si aucune page n'est sélectionnée et que nous ne sommes pas sur la dernière page...
            {
            $actualPage=1; // nous sommes donc sur la première page.

            }
             $req->closeCursor();

            $firstPost=($actualPage-1)*$nb_posts_page;
            $req=$db->prepare(sprintf("SELECT id, title, LEFT(content, 300) AS content, DATE_FORMAT(creation_date, '%%d/%%m/%%Y à %%Hh/%%imin/%%ss') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT %d,%d", $firstPost, $nb_posts_page));
            $req->execute(); */
            ?>
            <?php
while ($data = $posts->fetch())
{
?>
    <div class="card mb-4 news">
        <div class="card">
            <h5 class="card-header"><?= $data['title'] ?></h5>
            <div class="card-body">
                <p class="card-text"><?= $data['content'] ?></p>
                <div  class="d-flex justify-content-between">
                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire le chapitre &rarr;</a>
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?> #post-comment" >Commentaires</a></em>
                </div>
            </div>
            <div class="card-footer text-muted">
                Posté le <?= $data['creation_date_fr'] ?>
            </div>
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
            <em>Pages : </em>
            <?php
            //Affichage des pages
            for ($i=1; $i <= $nb_page ; $i++)
            {
                if ($i==$actualPage)
                {
                    echo '['. $i .']';
                }

                else
                {
                    echo '<a href="index.php?action=listPosts&page='.$i.'">'.$i.'</a> ';
                }
            }


            ?>
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item disabled">
                    <a class="page-link" href="#">&larr; Derniers parus</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Anciens chapitres &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
