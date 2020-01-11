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

function admin(){
    $postManager = new \OpenClassrooms\oc_project_4\Model\PostManager();
    $posts = $postManager->getPostsSample();
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $nbReport = $adminPostManager->countReport();

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
        echo '<script language="Javascript">
           <!--
                 document.location.replace("index.php?action=admin");
           // -->
     </script>';
    }
}

function getPostToUpdate($id){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $postUpdate = $adminPostManager->getPostToUpdate($id);

    require('view/frontend/updatePostView.php');
}


function updatePost($id, $title, $content){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $update = $adminPostManager->updatePost($id, $title, $content);

   if (!isset ($update)) {
        throw new Exception('Impossible de modifier le post !');
    }
    else {
        $_SESSION['msg'] = "La news a été modifiée avec succès !";
        echo '<script language="Javascript">
           <!--
                 document.location.replace("index.php?action=admin");
           // -->
     </script>';
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
        echo '<script language="Javascript">
           <!--
                 document.location.replace("index.php?action=admin");
           // -->
     </script>';
    }
}

function deleteComment($commentId){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $deleteCom = $adminPostManager->deleteComment($commentId);
    if (!isset ($deleteCom)) {
        throw new Exception("Impossible d'effacer le post !");
    }
    else {
        $_SESSION['msg'] = "Le commentaire a été effacée avec succès !";
        header('Location: index.php?action=reports');
    }
}

function getReportComments(){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $getReportCom = $adminPostManager->getReportComments();
    if (!isset($getReportCom)) {
        throw new Exception("Impossible d'afficher la page !");
    } elseif($getReportCom == false){
        $_SESSION['msg'] = "Aucun commentaire n'a été signalé !";
    }

    require('view/frontend/adminCommentaryView.php');
}

function cancelReport($commentId){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $report = $adminPostManager->cancelReport($commentId);
    if (!isset ($report)) {
        throw new Exception("Impossible d'annuler le signalement !");
    }
    else {
        $_SESSION['msg'] = "Le commentaire a été épargné !";
        header('Location: index.php?action=reports');
    }
}

function moderateComment($commentId){
    $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
    $mod = $adminPostManager->moderateComment($commentId);
    if (!isset ($mod)) {
        throw new Exception("Impossible d'annuler le signalement !");
    }
    else {
        $_SESSION['msg'] = "Le commentaire a été modéré";
        header('Location: index.php?action=reports');
    }
}