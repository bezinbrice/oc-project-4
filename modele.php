<?php

function getBillets()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        $reponse = $bdd->query('SHOW TABLES');
        $listeTables = $reponse->fetchAll();
        var_dump($listeTables);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%min%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

    return $req;
}
