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

    public function deleteComment($id){
        $db = $this->dbConnect();
        $deleteCom = $db->prepare("DELETE FROM comments WHERE comment_id= :id" );
        $deleteCom->execute(array(':id'=>$id));
        return $deleteCom->fetch();
    }

    public function countReport(){
        $db = $this->dbConnect();
        $nbReport = $db->prepare("SELECT COUNT(*) AS nbreports FROM comments WHERE report=1");
        $nbReport->execute();
        return $nbReport->fetch();
    }

    public function getReportComments(){
        $db = $this->dbConnect();
        $getReportCom = $db->prepare("SELECT comments.comment_id, comments.author, comments.comment, posts.id, posts.title, posts.content, DATE_FORMAT(comments.comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr, comments.report  FROM comments INNER JOIN posts ON comments.post_id = posts.id WHERE comments.report=1 ORDER BY comments.comment_date DESC" );
        $getReportCom->execute();
        return $getReportCom;
    }

    public function cancelReport($id){
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE comments SET report=0 WHERE comment_id=:id' );
        $report->execute(array(':id'=>$id));
        return $report->fetch();
    }

    public function moderateComment($id){
        $db = $this->dbConnect();
        $mod = $db->prepare('UPDATE comments SET comment = "Ce message a été modéré par l\'administrateur du site", report=0 WHERE comment_id=:id' );
        $mod->execute(array(':id'=>$id));
        return $mod->fetch();
    }

}