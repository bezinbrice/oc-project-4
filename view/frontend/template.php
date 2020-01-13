<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $titleSite ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="web/css/style.css" rel="stylesheet" />
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:#e3f2fd;" >
        <div class="container">
            <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=listPosts">Chapitres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">L'auteur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="body-page">
        <?= $content ?>
    </section>
    <footer class="py-5 bg-light">
        <div class="container">
            <div class="row d-flex justify-content-around">
                <form action="index.php?action=admin" method="post">
                    <p>
                        <input type="password" name="password" />
                        <input type="submit" value="Admin" />
                    </p>
                </form>
                <p class="m-0 text-center text-black">Copyright &copy; Billet pour l'Alaska, Jean Forteroche 2019</p>
            </div>
        </div>
    </footer>
        <script src="https://cdn.tiny.cloud/1/t8coht1jffvhbm4i2s2n4i1udvrqmtvskv1fbl1gch9j1a45/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script> tinymce.init({ selector: '#content'}); </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>