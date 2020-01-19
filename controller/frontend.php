<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function home()
{
    $postManager = new \OpenClassrooms\oc_project_4\Model\PostManager();
    $lastPost = $postManager->getLastPost();

    require('view/frontend/home.php');
}

function totalPosts()
{
    $postManager = new \OpenClassrooms\oc_project_4\Model\PostManager();
    $nb_posts =  $postManager->getTotalPosts();
    return $nb_posts;
}

function listPosts($actualPage, $nb_posts_page, $nb_page)
{
    $firstPost=($actualPage-1)*$nb_posts_page;
    $postManager = new \OpenClassrooms\oc_project_4\Model\PostManager();
    $posts = $postManager->getPosts($firstPost, $nb_posts_page);

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \OpenClassrooms\oc_project_4\Model\PostManager();
    $commentManager = new \OpenClassrooms\oc_project_4\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $commentManager = new \OpenClassrooms\oc_project_4\Model\CommentManager();

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\oc_project_4\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function report($commentId, $postId)
{
    $commentManager = new \OpenClassrooms\oc_project_4\Model\CommentManager();
    $report = $commentManager->reportComment($commentId);

    header('Location: index.php?action=post&id=' . $postId);
}

function authorPage()
{
    require('view/frontend/authorView.php');
}

function contactPage()
{
    require('view/frontend/contactView.php');
}