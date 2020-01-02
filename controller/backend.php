<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminPostManager.php');

function isAdmin(){
    if(!isset ($_SESSION['admin'])){
        if(isset($_POST['password']) && $_POST['password'] == "pass"){
            $_SESSION['admin'] = true;
            header('Location: index.php?action=admin');
        } else {
            throw new Exception('Cette page est réservé à l\'administrateur.');
        }
    }
}

function admin($id){
    $postManager = new \OpenClassrooms\oc_project_4\Model\PostManager();
    $posts = $postManager->getPosts();

    $commentManager = new \OpenClassrooms\oc_project_4\Model\CommentManager();
    $comments = $commentManager->getComments($id);
 /**    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
        $posts = $adminPostManager->getAllPosts(); */

    if ($id == 0){
        $postUpdate['id'] = 0;
        $postUpdate['title'] = '';
        $postUpdate['content'] = '';


    }else {
        $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
        $postUpdate = $adminPostManager->getPostToUpdate($id);
    }

    require('view/frontend/adminView.php');
}

function createPost($title, $content){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();

    $newPost = $adminPostManager->createPost($title, $content);

    if (!isset ($newPost)) {
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

   if (!isset ($update)) {
        throw new Exception('Impossible de modifier le post !');
    }
    else {
        $_SESSION['msg'] = "La news a été modifiée avec succès !";
        header('Location: index.php?action=admin');
    }
}

function deletePost($id){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $delete = $adminPostManager->deletePost($id);

    if (!isset ($delete)) {
        throw new Exception("Impossible d'effacer le post !");
    }
    else {
        $_SESSION['msg'] = "La news a été effacée avec succès !";
        header('Location: index.php?action=admin');
    }
}