<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/AdminManager.php';

use model\PostManager;
use model\CommentManager;
use model\AdminManager;

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
    $commentManagerPost = new CommentManager();
    $commentsPost=$commentManagerPost->deleteCommentsPost($postId);

    if($posts==false){
        throw new Exception("Y'a comme qui dirait du soucis à se faire : impossible de supprimer le billet !");
    }
    else{
        header('Location:index.php?action=adminComment');
    }


}

function editPost(){
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);
    /*$commentReportedManager = new CommentManager();
    $reportedComments = $commentReportedManager->getReportedComment($_GET['id']);
    $commentLambdaManager = new CommentManager();
    $lambdaComments = $commentLambdaManager->getLambdaComment($_GET['id']);*/



    require_once 'view/backend/EditPostView.php';

}

function editComment(){
    $commentReportedManager = new CommentManager();
    $reportedComments = $commentReportedManager->getReportedComment($_GET['id']);
    $commentLambdaManager = new CommentManager();
    $lambdaComments = $commentLambdaManager->getLambdaComment($_GET['id']);


    require_once 'view/backend/editCommentView.php';
}

function adminConnexion(){
    require_once 'view/backend/adminConnexionView.php';
}

/*function authentificationConnexion(){
    $adminManager= new AdminManager();
    $passHache=password_hash($_POST['password'],PASSWORD_DEFAULT);var_dump($passHache);die;
    $AuthentificatedConnexion = $adminManager->getConnexion($passHache);

    if(!$AuthentificatedConnexion){

        echo'Mauvais identifiant ou mot de passe !';

    }
    else
    {
        session_start();
        $_SESSION['id']=$AuthentificatedConnexion['id'];
        $_SESSION['login']=$_post['login'];
        echo'vous êtes connecté';

        require_once 'view/backend/adminPostView.php';
    }
}*/

function authentificationConnexion(){
    $adminManager= new AdminManager();
    $authentification = $adminManager->getConnexion();

}

function signIn(){
    require_once 'view/backend/signInForm.php';
}

function getSignIn(){
    $adminManager = new AdminManager();
    $getLogin= $adminManager->getLogin();
    if($getLogin==false){
        throw new Exception("Y'a comme qui dirait du soucis à se faire : impossible d'insérer vos idenfiants !");
    }
    else{
        header('Location:index.php?action=authentificationConnexion');
    }



}

function signOut(){
    $adminManager= new AdminManager();
    $getOut = $adminManager->disconnect();
    header('Location:index.php');
}




