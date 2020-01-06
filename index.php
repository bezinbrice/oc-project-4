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
                } /**elseif ( $_GET['comment_id'] && $_GET['post_id']){
                report($_GET['comment_id'], $_GET['post_id']);
            } */else{
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

            case('report'):
                    report($_GET['comment_id'], $_GET['post_id']);
                    if(isset($_SESSION['admin']) && isset($_POST['deleteComment'])){
                        deleteComment($_GET['comment_id']);
                    } elseif(isset($_SESSION['admin']) && isset($_POST['cancelReport'])){
                        cancelReport($_GET['comment_id']);
                    }
                break;

            case('admin'):
                    if(!isset($_SESSION['admin'])) {
                        isAdmin();
                    } elseif(isset($_SESSION['admin'])){
                            if(!isset($_GET['edit'])){
                                admin();
                                if(isset($_POST['save'])) {
                                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                                        createPost($_POST['title'], $_POST['content']);
                                    } else {
                                        throw new Exception('Tous les champs ne sont pas remplis !');
                                    }
                                }
                            } elseif (isset($_GET['edit'])){
                                getPostToUpdate($_GET['edit']);
                                if (isset($_POST['update'])) {
                                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                                        updatePost($_GET['edit'],$_POST['title'], $_POST['content']);
                                    }
                                    else {
                                        throw new Exception('Tous les champs ne sont pas remplis !');
                                    }
                                }  elseif (isset($_POST['delete'])){
                                    deletePost($_GET['edit']);
                                    throw new Exception('Tous les champs ne sont pas remplis !');
                                }
                            }/** elseif(isset($_POST['reports'])){
                                $db = new \PDO('mysql:host=localhost:3308;dbname=oc4;charset=utf8', 'root', 'root');
                                $getReportCom = $db->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr, report  FROM comments WHERE report = 1 ORDER BY comment_date DESC" );
                                $getReportCom->execute();
                                require('view/frontend/adminCommentaryView.php');
                                header('Location: index.php?action=admin&adminCommentaryView');
                            } */
                        } else {
                        throw new Exception('Espace réservé à l\'administrateur');
                    }
                break;
            case('reports'):
                if(isset($_SESSION['admin'])){
                    getReportComments();
                }
                else{
                    throw new Exception('Espace réservé à l\'administrateur');
                }
                break;
        }
    }
    else {
        home();
    }
}

catch(Exception $e){
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
