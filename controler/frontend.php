<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
use model\CommentManager;
use model\PostManager;


function listPosts(){
    $postManager = new PostManager() ;
    $posts = $postManager->getPosts();
    require_once 'view/frontend/listPostsView.php';

}

function post(){
    $postManager = new PostManager();
    $commentManager = new CommentManager();


    $post = $postManager->getPost($_GET['id']);
    $comments =$commentManager->getComment($_GET['id']);
    require('view/frontend/postView.php');

}

function addComments($postId){
    $commentManager = new CommentManager();


    if (empty($_POST['email'])){
        $comments= $commentManager->postComment($postId);
        header('Location:index.php?action=post&id='.$postId);

    }
    else{
        $_POST['email'] = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
        {
            $comments= $commentManager->postComment($postId);
            if($comments===false){
                throw new Exception("Y'a comme qui dirait du soucis à se faire : impossible d'ajouter le commentaire");
            }else{

                header('Location:index.php?action=post&id='.$postId);
            }
        }
        else
        {

            throw new Exception ('L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !');
            //echo 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
        }
    }
}

function reportComment($commentId){
    $commentManager= new CommentManager();
    $report= $commentManager->reportSignalizedComment($commentId);

    if($report===false){
        throw new Exception("Y'a comme qui dirait du soucis à se faire : impossible de signaler le commentaire");
    }else{
        $message= "le commentaire é été signaler à Monsieur ForteRoche";

        header('location:index.php');
    }
}