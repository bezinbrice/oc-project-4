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

           /** case('isAdmin'):
                if (isset($_POST['password']) && $_POST['password'] ==  "pass"){
                    $isAuthenticated = true;
                }
                elseif (!$_POST['password'] ==  "pass"){
                    throw new Exception('Attention le mot de passe est incorrect !');
                }
                break; */

            case('admin'):

                    if(!isset($_GET['edit'])){
                        admin(0);

                    } elseif(isset($_POST['save'])){
                        if (!empty($_POST['title']) && !empty($_POST['content'])) {
                            createPost($_POST['title'], $_POST['content']);
                            var_dump($_POST['title']);
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    } elseif (isset($_GET['edit'])){
                        admin($_GET['edit']);

                        if (isset($_POST['update'])) {
                            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                                updatePost($_GET['edit'],$_POST['title'], $_POST['content']);
                                /**$id = $_GET['edit'];
                                $title = $_POST['title'];
                                $content = $_POST['content'];
                                $db = new \PDO('mysql:host=localhost:3308;dbname=oc4;charset=utf8', 'root', 'root');
                                $update = $db->prepare("UPDATE posts SET title= :title, content=:content WHERE id=:id" );
                                $update->execute(array(':id'=>$id, ':title'=>$title, ':content'=>$content));
                                $update->fetch();
                                var_dump($update); */

                            }
                            else {
                                throw new Exception('Tous les champs ne sont pas remplis !');
                            }
                        }  elseif (isset($_POST['delete'])){
                            deletePost($_GET['edit']);
                            throw new Exception('Tous les champs ne sont pas remplis !');
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
