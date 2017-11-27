<?php
namespace model;
require_once 'model/Manager.php';
use model\Manager;
use PDO;
class PostManager extends Manager
{

    public function getPosts(){
// Connexion à la base de données
   $db=$this->dbConnect();

// On récupère les derniers billets
    $req = $db->query('SELECT id, title,resume, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(modification_date, \'%d/%m/%Y\') AS modification_date_fr FROM posts ORDER BY creation_date ASC LIMIT 0, 15');

    return $req;

}

    public function getPost($postId){

    $db=$this->dbConnect();

// Récupération du post
    $req = $db->prepare('SELECT id, title,resume, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}



   /* public function postPost(){
        $db = $this->dbConnect();
        $pdoStat = $db->prepare('INSERT INTO posts(title,resume,content,creation_date) VALUES(?,?,?,NOW())');
        $newPost= $pdoStat->execute(array($_POST['title'],$_POST['resume'],$_POST['content']));
        return $newPost;
    }*/

   public function postPost(){
       $pdo=$this->dbConnect();
       $pdoStat = $pdo->prepare('INSERT INTO posts VALUES (NULL,:title, :resume, :content, NOW(),NULL)');
       $pdoStat->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
       $pdoStat->bindValue(':resume', $_POST['resume'], PDO::PARAM_STR);
       $pdoStat->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
       $newPost= $pdoStat->execute();
       return $newPost;
   }




}


