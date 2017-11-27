<?php
namespace model;
require_once 'model/Manager.php';
use model\Manager;
use PDO;
class CommentManager extends Manager
{

    public function getComments($postId){
        // Récupération des comments
        $db= $this->dbConnect();

        $comments = $db->prepare('SELECT id,author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE reportedcomment= 0 AND  postId = ? ORDER BY comment_date');
        $comments->execute(array($postId));
        return $comments;

    }

    public function postComment($postId){
        $db= $this->dbConnect();
        $PdoStat=$db->prepare('INSERT INTO comments VALUES (NULL,:postId,:author,:email,:comment, NOW(), 0)');
        $PdoStat->bindValue(':postId',$postId,PDO::PARAM_STR);
        $PdoStat->bindValue(':author',$_POST['author'],PDO::PARAM_STR);
        $PdoStat->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
        $PdoStat->bindValue(':comment',$_POST['comment'],PDO::PARAM_STR);

        $comments=$PdoStat->execute();
        return $comments;
    }

   /* public function listPostAdmin(){

        $pdo=$this->dbConnect();
        $pdoStat= $pdo->prepare('
        SELECT posts.id,posts.title,DATE_FORMAT(posts.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS creation_date_fr,DATE_FORMAT(posts.modification_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS modification_date_fr, 
        COUNT(comments.comment) 
        AS nbComment,
        COUNT(comments.reportedComment)
        AS repComments
        FROM comments 
        INNER JOIN Posts 
        ON comments.postId= posts.id 
        GROUP BY posts.id');

        $excuteIsOk= $pdoStat->execute();
        $nbComments=$pdoStat->fetchAll();
        return $nbComments;



    }*/


    public function reportSignalizedComment($commentId){
        $pdo=$this->dbConnect();
        $pdoStat=$pdo->prepare('UPDATE comments set reportedComment=:reportedComment WHERE id=:commentId');
        $pdoStat->bindValue(':commentId', $commentId,PDO::PARAM_INT);
        $pdoStat->bindValue(':reportedComment', $_POST['reportedComment'],PDO::PARAM_INT);
        $report= $pdoStat->execute();

        return $report;

    }

}