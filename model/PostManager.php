<?php

namespace OpenClassrooms\oc_project_4\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getLastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, LEFT(content, 300) AS sample, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 1');

        return $req;
    }
    /**public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, LEFT(content, 300) AS content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    } */

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPostsSample(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT LEFT(content, 300) AS sample, id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getTotalPosts(){
        $db = $this->dbConnect();
        $req=$db->query('SELECT COUNT(*) AS nb_posts FROM posts');
        $data=$req->fetch();
        $nb_posts= $data['nb_posts'];
        return $nb_posts;
    }

    public function getPosts($firstPost, $nb_posts_page){
        $db = $this->dbConnect();
        $req=$db->prepare(sprintf("SELECT id, title, LEFT(content, 300) AS content, DATE_FORMAT(creation_date, '%%d/%%m/%%Y à %%Hh/%%imin/%%ss') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT %d,%d", $firstPost, $nb_posts_page));
        $req->execute();

        return $req;
    }
}