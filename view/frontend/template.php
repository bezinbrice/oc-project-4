<!DOCTYPE html>
<html  lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $titleSite ?></title>
        <link href="web/css/style.css" rel="stylesheet" />
        <script src="https://cdn.tiny.cloud/1/t8coht1jffvhbm4i2s2n4i1udvrqmtvskv1fbl1gch9j1a45/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            tinymce.init({
                selector: '#content'
            });
        </script>
    </head>
    <body>
        <?= $content ?>
    </body>
</html>