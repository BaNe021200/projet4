<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
use BaseBlog\model\CommentManager;
use BaseBlog\model\PostManager;


function listPosts(){
    $postManager = new PostManager() ;
    $posts = $postManager->getPosts();
    require_once 'view/frontend/listPostsView.php';

}

function post(){
    $postManager = new PostManager();
    $commentManager = new CommentManager();


    $post = $postManager->getPost($_GET['id']);
    $comments =$commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');

}

function addComments($postId){
    $commentManager = new CommentManager();

    $comments= $commentManager->postComment($postId);
 if($comments===false){
     throw new Exception("Y'a comme qui dirait une couille dans le potage : impossible d'ajouter le commentaire");
 }else{
     header('Location:index.php?action=post&id='.$postId);
 }
}