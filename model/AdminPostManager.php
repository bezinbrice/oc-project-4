<?php

namespace OpenClassrooms\oc_project_4\Model;

require_once("model/Manager.php");

class AdminPostManager extends Manager
{
    public function createPost($title, $content)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES( :title, :content, NOW())');
        $newPost->execute(array(':title'=>$title, ':content'=>$content));
        return $newPost->fetch();
    }

    public function getPostToUpdate($id){
        $db = $this->dbConnect();
        $update = $db->prepare("SELECT * FROM posts WHERE id=:id" );
        $update->execute(array(':id'=>$id));

        return $update->fetch();
    }

    public function updatePost($id, $title, $content){
        $db = $this->dbConnect();
        $update = $db->prepare("UPDATE posts SET title= :title, content=:content WHERE id=:id" );
        $update->execute(array(':id'=>$id, ':title'=>$title, ':content'=>$content));

        return $update->fetch();
    }

    public function deletePost($id){
        $db = $this->dbConnect();
        $delete = $db->prepare("DELETE FROM posts, comments USING posts LEFT JOIN comments ON comments.post_id = posts.id WHERE posts.id= :id" ); /**On lie les commentaires associés au post pour les supprimer aussi */
        $delete->execute(array(':id'=>$id));
        return $delete->fetch();
    }
}