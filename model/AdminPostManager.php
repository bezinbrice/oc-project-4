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
        $delete = $db->prepare("DELETE FROM posts WHERE id= :id" );
        $delete->execute(array(':id'=>$id));
        return $delete->fetch();
    }

    /**public function getAllPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT posts.id, posts.title, posts.content, DATE_FORMAT(posts.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, comments.id, comments.author, comments.comment, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM posts JOIN comments ON posts.id = comments.post_id ORDER BY comments.comment_date DESC');
        return $req;


    } */

}