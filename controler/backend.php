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
    $authorizedCommentsManager = new CommentManager();
    $authorizedComments = $authorizedCommentsManager->getAuthorizedComments();
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




    require_once 'view/backend/EditPostView.php';

}

function editComment(){

    $commentLambdaManager = new CommentManager();
    $lambdaComments = $commentLambdaManager->getLambdaComment($_GET['id']);


    require_once 'view/backend/editCommentView.php';
}

function editReportedComment(){
    $commentReportedManager = new CommentManager();
    $reportedComments = $commentReportedManager->getReportedComment($_GET['id']);
    require_once 'view/backend/editReportedCommentView.php';
}

function editAuthorisedComment(){
    $authorisedCommentManager = new CommentManager();
    $autoComments = $authorisedCommentManager->getAutoComment($_GET['id']);
    require_once 'view/backend/editAuthorisedCommentView.php';
}

function eraseReporting($commentId){
    $commentManager= new CommentManager();
    $dereportedComment= $commentManager->eraseReporting($commentId);

    if($dereportedComment===false){
        throw new Exception("Impossible de désignaler le commentaire");
    }
    else{
        header('Location:index.php');
    }
}

function adminConnexion(){
    require_once 'view/backend/adminConnexionView.php';
}

function authentificationConnexion(){
    $adminManager= new AdminManager();
    $authentification = $adminManager->getConnexion();
    $pwd=$_POST['password'];
    if(password_verify($pwd,$authentification)){

        session_start();
        $_SESSION['id']=$authentification['id'];
        $_SESSION['login']= $_POST['login'];
        setcookie("ID",$_SESSION['id'], time() + 3600*24*365,null, null, false, true);
        setcookie("Login",$_SESSION['login'], time() + 3600*24*365,null, null, false, true);


        header('Location:index.php?action=adminPost');


    }
    else{
        throw new Exception('Mauvais identifiant ou mot de passe !');
    }








}

function signIn(){
    require_once 'view/backend/signInForm.php';
}

function getSignIn($login){

        $veryLogin= new AdminManager();
    $getLogin = $veryLogin->getLogin($login);
        if(is_null($getLogin)){

            $adminManager = new AdminManager();
            $insertLogin= $adminManager->insertLogin($login);
            if($insertLogin==false){
                throw new Exception("Y'a comme qui dirait du soucis à se faire : impossible d'insérer vos idenfiants !");
            }
            else{
                header('Location:index.php?action=adminConnexion');
            }


        }
        else
        {
            throw new Exception("Le login ".$login." existe déjà !");
        }








}

function signOut(){
    $adminManager= new AdminManager();
    $getOut = $adminManager->disconnect();
    header('Location:index.php');
}

function addAnswer($commentId){
    $comment= new CommentManager();
    $newAnswer = $comment->postAnswer($commentId);

    if($newAnswer){
        header('Location:index.php?action=adminComment');
    }

}


