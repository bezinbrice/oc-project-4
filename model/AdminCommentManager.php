<?php


namespace OpenClassrooms\oc_project_4\Model;
require_once("model/Manager.php");

class AdminCommentManager extends Manager
{
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