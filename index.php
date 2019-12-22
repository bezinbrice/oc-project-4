<?php

require('controller/frontend.php');
require('controller/backend.php');

session_start();
try {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case('listPosts'):
                listPosts();
                break;

            case('post'):
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                } else {
                    throw new Exception('aucun identifiant de billet envoyé');
                }
                break;

            case('addComment'):
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
                break;

            case('admin'):
                admin();
                    if (isset($_POST['save'])){
                        if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        createPost($_POST['title'], $_POST['content']);
                        } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    } elseif (isset($_GET['edit'])){
                        $id = $_GET['edit'];
                        $edit_state = true;
                        require_once('model/AdminPostManager.php');
                        $adminPostManager = new \OpenClassrooms\oc_project_4\Model\AdminPostManager();
                        $post = $adminPostManager->getPostToUpdate($id);
                        var_dump($post);
                        die;
                            if (isset($_POST['update'])) {
                                $title = $_POST['title'];
                                $content = $_POST['content'];
                                $id = $_POST['id'];
                                updatePost($id, $title, $content);
                            }
                    }
                break;
        }
    }
    else {
        listPosts();
    }
}

catch(Exception $e){
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
