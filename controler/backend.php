<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';

use model\PostManager;
use model\CommentManager;

function publicationPost(){
    require_once 'view/backend/publicationView.php';
}

function addPost(){
$postManager = new PostManager();
    $newPost = $postManager->postPost();
    if($newPost==false){
    throw new Exception("Une erreur s'est manifestement installée dans le backend fonction addpost... impossible d'ajouter votre nouveau chapître...c'est ballot non ?");
    }
    else{
    header("Location:index.php");
    }


}

function adminPost(){
    $PostManager = new PostManager();
    $posts = $PostManager->listPostAdmin();

    require_once 'view/backend/adminPostView.php';
}

function adminComment(){
    $reportedCommentManager= new CommentManager();
    $reportedComments = $reportedCommentManager->getReportedComments();
    $commentManager = new CommentManager();
    $comments=$commentManager->getLambdaComments();
    require_once 'view/backend/adminCommentView.php';

}

function modifyPost(){
    $postManager = new PostManager() ;
    $posts = $postManager->getPost($_GET['id']);
    require_once 'view/backend/modifyPostView.php';

}

function updatePosts($postId){
    $postManager = new PostManager();
    $posts= $postManager->updatePost($postId);
    if($posts==false){
        throw new Exception("Y'a comme qui dirait du soucis à se faire : impossible de modifier le billet !");
    }
    else{
        header('Location:index.php?action=adminPost');
    }
}

function deletePost($postId){
    $postManager =new PostManager();
    $posts= $postManager->deletePost($postId);
    $commentManager= new CommentManager();
    $comments= $commentManager->deleteComment($postId);
    if($posts==false){
        throw new Exception("Y'a comme qui dirait du soucis à se faire : impossible de supprimer le billet !");
    }
    else{
        header('Location:index.php?action=adminPost');
    }


}

function editPost(){
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);
    require_once 'view/backend/EditPostView.php';

}

function editComment(){
    $commentManager = new CommentManager();
    $comments = $commentManager->getComment($_GET['id']);
    require_once 'view/backend/editReportedCommentView.php';

}

function editReportedComment(){
    $commentManager = new CommentManager();
    $reportedComments = $commentManager->getReportedComment($_GET['id']);
    require_once 'view/backend/editReportedCommentView.php';
}

function editLamdaComment(){
    $commentManager = new CommentManager();
    $lambdaComments = $commentManager->getLambdaComment($_GET['id']);
    require_once 'view/backend/editLambdaCommentView.php';


}