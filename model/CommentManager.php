<?php
namespace BaseBlog\model;
require_once 'model/Manager.php';
use BaseBlog\model\Manager;
use PDO;
class CommentManager extends Manager
{

    public function getComments($postId){
        // Récupération des comments
        $db= $this->dbConnect();

        $comments = $db->prepare('SELECT id,author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE postId = ? ORDER BY comment_date');
        $comments->execute(array($postId));
        return $comments;

    }

    public function postComment($postId){
        $db= $this->dbConnect();
        $PdoStat=$db->prepare('INSERT INTO comments VALUES (NULL,:postId,:author,:email,:comment, NOW())');
        $PdoStat->bindValue(':postId',$postId,PDO::PARAM_STR);
        $PdoStat->bindValue(':author',$_POST['author'],PDO::PARAM_STR);
        $PdoStat->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
        $PdoStat->bindValue(':comment',$_POST['comment'],PDO::PARAM_STR);
        $comments=$PdoStat->execute();
        return $comments;
    }

   /*public function postComment($postId, $author, $comment)

    {

        $db = $this->dbConnect();

        $comments = $db->prepare('INSERT INTO comments(postId, author, comment, comment_date) VALUES(?, ?, ?, NOW())');

        $affectedLines = $comments->execute(array($postId, $author, $comment));


        return $affectedLines;

    }*/




}