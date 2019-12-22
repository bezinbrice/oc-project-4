<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminPostManager.php');

function admin(){
    $postManager = new \OpenClassrooms\oc_project_4\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/adminView.php');
}

function createPost($title, $content){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();

    $newPost = $adminPostManager->createPost($title, $content);

    if ($newPost === false) {
        throw new Exception('Impossible d\'ajouter le nouveau post !');
    }
    else {
        $_SESSION['msg'] = "La news a été postée avec succès !";
        header('Location: index.php?action=admin');
    }
}



function updatePost($id, $title, $content){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $update = $adminPostManager->updatePost($id, $title, $content);

    if ($update === false) {
        throw new Exception('Impossible de modifier le post !');
    }
    else {
        $_SESSION['msg'] = "La news a été modifiée avec succès !";
        header('Location: index.php?action=admin');
    }
}