<?php
namespace model;
require_once 'model/Manager.php';
use model\Manager;
use PDO;
class CommentManager extends Manager
{

    /*public function getComment($postId){
        // Récupération des comments
        $pdo= $this->dbConnect();

        $comments = $pdo->prepare('SELECT id,author, comment, answerAuthor,answer,DATE_FORMAT(answerDate, \'%d/%m/%Y à %Hh%i\') AS answer_date_fr, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, reportedComment FROM comments WHERE reportedcomment= 0 AND  postId = ? ORDER BY comment_date');
        $comments->execute(array($postId));

        return $comments;

    }*/
    public function getComment(){
        // Récupération des comments
        $pdo= $this->dbConnect();

        $pdoStat = $pdo->prepare('SELECT id,author, comment, answerAuthor,answer,DATE_FORMAT(answerDate, \'le %d/%m/%Y à %Hh%i\') AS answer_date_fr, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %Hh%i\') AS comment_date_fr, reportedComment FROM comments WHERE reportedcomment= 0 AND  postId = :postId ORDER BY comment_date');
        $pdoStat->bindValue(':postId',$_GET['id'],PDO::PARAM_INT);
        $comments = $pdoStat->execute();
        $comments = $pdoStat->fetchAll();

        return $comments;

    }

    public function getAuthorizedComment(){
        // Récupération des comments
        $pdo= $this->dbConnect();

        $pdoStat = $pdo->prepare('SELECT id,author, comment, answerAuthor,answer,DATE_FORMAT(answerDate, \'le %d/%m/%Y à %Hh%i\') AS answer_date_fr, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %Hh%i\') AS comment_date_fr, reportedComment FROM comments WHERE reportedcomment= 2 AND  postId = :postId ORDER BY comment_date');
        $pdoStat->bindValue(':postId',$_GET['id'],PDO::PARAM_INT);
        $authorizedComments = $pdoStat->execute();
        $authorizedComments = $pdoStat->fetchAll();

        return $authorizedComments;

    }

    public function  getAuthorizedComments(){
        $pdo= $this->dbConnect();
        $pdoStat=$pdo->query('
        SELECT posts.title,comments.id, postId, author, email,comment,comments.answerAuthor,comments.answer,DATE_FORMAT(comments.answerDate, \'le %d/%m/%Y à %Hh%i\') AS answer_date_fr,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr,reportedComment
        FROM comments
        INNER JOIN posts
        ON comments.postId = posts.id
        WHERE comments.reportedComment=2
        ORDER BY  comments.comment_date DESC');
        $authorizedComments= $pdoStat->execute();
        $authorizedComments=$pdoStat->fetchAll();

        return $authorizedComments;

    }

    public function getAutoComment($commentId){
        // Récupération des comments
        $pdo= $this->dbConnect();

        $pdostat = $pdo->prepare('
        SELECT id,author,email, comment,answer
        FROM comments
        WHERE reportedcomment= 2
        AND id =?');
        $pdostat->execute(array($commentId));
        $autoComments=$pdostat->fetch();
        return $autoComments;

    }

    public function postComment($postId){
        $pdo= $this->dbConnect();
        $PdoStat=$pdo->prepare('INSERT INTO comments VALUES (NULL,:postId,:author,:email,:comment,NULL,NULL, NOW(),NULL, 0)');
        $PdoStat->bindValue(':postId',$postId,PDO::PARAM_STR);
        $PdoStat->bindValue(':author',$_POST['author'],PDO::PARAM_STR);
        $PdoStat->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
        $PdoStat->bindValue(':comment',$_POST['comment'],PDO::PARAM_STR);

        $comments=$PdoStat->execute();
        return $comments;
    }




    public function reportSignalizedComment($commentId){
        $pdo=$this->dbConnect();
        $pdoStat=$pdo->prepare('UPDATE comments set reportedComment=:reportedComment WHERE id=:commentId');
        $pdoStat->bindValue(':commentId', $commentId,PDO::PARAM_INT);
        $pdoStat->bindValue(':reportedComment', $_POST['reportedComment'],PDO::PARAM_INT);
        $report= $pdoStat->execute();

        return $report;

    }

    public function eraseReporting($commentId){
        $pdo=$this->dbConnect();
        $pdoStat=$pdo->prepare('UPDATE comments set reportedComment=:reportedComment WHERE id=:commentId');
        $pdoStat->bindValue(':commentId', $commentId,PDO::PARAM_INT);
        $pdoStat->bindValue(':reportedComment', $_POST['reportedComment'],PDO::PARAM_INT);
        $report= $pdoStat->execute();

        return $report;

    }




    public function  getLambdaComments(){
        $pdo= $this->dbConnect();
        $pdoStat=$pdo->query('
        SELECT posts.title,comments.id, postId, author, email,comment,comments.answerAuthor,comments.answer,DATE_FORMAT(comments.answerDate, \'%d/%m/%Y à %Hh%i\') AS answer_date_fr,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr,reportedComment
        FROM comments
        INNER JOIN posts
        ON comments.postId = posts.id
        WHERE comments.reportedComment=0
        ORDER BY  comments.comment_date DESC');
        $pdoStat->execute();
        return $pdoStat;

    }


    public function  getReportedComments(){
        $pdo= $this->dbConnect();
        $pdoStat=$pdo->query('
        SELECT comments.id,posts.title, postId, author, email,comment,comments.answerAuthor,comments.answer,DATE_FORMAT(comments.answerDate, \'%d/%m/%Y à %Hh%i\') AS answer_date_fr,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr,reportedComment
        FROM comments
        INNER JOIN posts
        ON comments.postId = posts.id
        WHERE comments.reportedComment=1
        ORDER BY  comments.comment_date DESC ');
        return $pdoStat;

    }

    public function getLambdaComment($commentId){
        // Récupération des comments
        $pdo= $this->dbConnect();

        $pdostat = $pdo->prepare('
        SELECT id,author,email, comment,answer
        FROM comments
        WHERE reportedcomment= 0
        AND id =?');
        $pdostat->execute(array($commentId));
        $lambdaComments=$pdostat->fetch();
        return $lambdaComments;

    }


    public function getReportedComment($commentId){
        // Récupération des comments
        $pdo= $this->dbConnect();

        $pdostat = $pdo->prepare('
        SELECT id,author,email, comment,answer
        FROM comments
        WHERE reportedcomment= 1
        AND id =?');
        $pdostat->execute(array($commentId));
        $reportedComments=$pdostat->fetch();
        return $reportedComments;

    }

    public function deleteComment($id){
        $pdo=$this->dbConnect();
        $pdoStat= $pdo->prepare('DELETE FROM comments WHERE id=:num  LIMIT 1');
        $pdoStat->bindValue(':num', $id,PDO::PARAM_INT);
        $deletedComment=$pdoStat->execute();
        return $deletedComment;
    }

    public function deleteCommentsPost($postId){
        $pdo=$this->dbConnect();
        $pdoStat= $pdo->prepare('DELETE FROM comments WHERE postId=:num  ');
        $pdoStat->bindValue(':num', $postId,PDO::PARAM_INT);
        $deletedCommentsPost=$pdoStat->execute();
        return $deletedCommentsPost;
    }

    public function postAnswer($commentId){
        $pdo=$this->dbConnect();
        $pdoStat = $pdo->prepare('UPDATE comments set answerAuthor=:answerAuthor, answer=:answer, answerDate=NOW() WHERE id=:commentId');
        $pdoStat->bindValue(':commentId', $commentId,PDO::PARAM_INT);
        $pdoStat->bindValue(':answerAuthor', $_POST['answerAuthor'],PDO::PARAM_STR);
        $pdoStat->bindValue(':answer', $_POST['answer'],PDO::PARAM_STR);
        $answer = $pdoStat->execute();
        return $answer;

    }
}