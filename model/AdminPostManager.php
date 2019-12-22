<?php

namespace OpenClassrooms\oc_project_4\Model;

require_once("model/Manager.php");

class AdminPostManager extends Manager
{
    public function createPost($title, $content)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES( ?, ?, NOW())');
        $affectedLines = $newPost->execute(array($title, $content));

        return $affectedLines;
    }

    public function getPostToUpdate($id){
        $db = $this->dbConnect();
        $update = $db->prepare("SELECT * FROM posts WHERE id= ?" );
        $update->execute(array($id));

        return $update;
    }

    public function updatePost($id, $title, $content){
        $db = $this->dbConnect();
        $update = $db->prepare("UPDATE `posts` SET `title` = '$title', `content`='$content' WHERE id=$id" );
        $updateLines= $update->execute(array($id, $title, $content));

        return $updateLines;
    }

}